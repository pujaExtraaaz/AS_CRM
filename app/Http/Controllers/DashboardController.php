<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Call;
use App\Models\CommonCase;
use App\Models\Contact;
use App\Models\Invoice;
use App\Models\Lead;
use App\Models\Meeting;
use App\Models\Opportunities;
use App\Models\Product;
use App\Models\Quote;
use App\Models\SalesOrder;
use App\Models\Task;
use App\Models\User;
use App\Models\Order;
use App\Models\Plan;
use App\Models\Utility;
use App\Models\LandingPageSections;
use App\Models\Yard;
use App\Models\SalesReturn;
use App\Models\SalesDispute;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\In;
use function Symfony\Component\String\s;

class DashboardController extends Controller {

    public function index() {
        if (\Auth::check()) {
            if (\Auth::user()->type == 'super admin') {
                $user = \Auth::user();
                $user['total_user'] = $user->countCompany();
                $user['total_paid_user'] = $user->countPaidCompany();
                $user['total_orders'] = Order::total_orders();
                $user['total_orders_price'] = Order::total_orders_price();
                $user['total_plan'] = Plan::total_plan();
                $user['most_purchese_plan'] = (!empty(Plan::most_purchese_plan()) ? Plan::most_purchese_plan()->name : '-');
                $chartData = $this->getOrderChart(['duration' => 'week']);

                return view('super_admin', compact('user', 'chartData'));
            } else {
                $data['totalUser'] = User::where('created_by', \Auth::user()->creatorId())->count();
                $data['totalLead'] = Lead::count();
                $data['totalSalesorder'] = SalesOrder::count();
                $data['totalYard'] = Yard::count();

                // Calculate total_sales_return and total_dispute counts - filter by user if not owner
                if (\Auth::user()->type == 'owner') {
                    $data['totalReturn'] = SalesReturn::count();
                    $data['totalDispute'] = SalesDispute::count();
                } else {
                    $data['totalReturn'] = SalesReturn::where('user_id', \Auth::user()->id)->count();
                    $data['totalDispute'] = SalesDispute::where('user_id', \Auth::user()->id)->count();

                    // Calculate total deduction amounts for regular user
                    $data['total_sales_return_deduction'] = SalesReturn::where('user_id', \Auth::user()->id)->sum('total_deduction') ?? 0;
                    $data['total_dispute_deduction'] = SalesDispute::where('user_id', \Auth::user()->id)->sum('total_deduction') ?? 0;
                }

                // Calculate performance metrics
                $currentMonth = Carbon::now()->startOfMonth();
                $currentMonthEnd = Carbon::now()->endOfMonth();
                $currentUserId = \Auth::user()->id;

                // Top Performer - User with highest gross profit this month
                $topPerformer = SalesOrder::select('sales_user_id', DB::raw('SUM(COALESCE(gross_profit, 0)) as total_gp'))->with('assign_user')
                        ->whereNotNull('sales_user_id')
                        ->whereNotNull('sale_date')
                        ->whereBetween('sale_date', [$currentMonth->format('Y-m-d'), $currentMonthEnd->format('Y-m-d')])
                        ->groupBy('sales_user_id')
                        ->orderBy('total_gp', 'desc')
                        ->first();

                $data['topPerformer'] = ($topPerformer && $topPerformer->assign_user) ? $topPerformer->assign_user->name : 'N/A';
                $data['topPerformerValue'] = \Auth::user()->priceFormat($topPerformer->total_gp ?? 0, 2);

                $monthlyTarget = \Auth::user()->monthly_target; // This can be made configurable later
                if (in_array(\Auth::user()->type, ['owner', 'super admin'])) {
                    // Calculate total deduction amounts for owner
                    $total_sales_return_deduction = SalesReturn::whereBetween('return_date', [$currentMonth->format('Y-m-d'), $currentMonthEnd->format('Y-m-d')])->sum('total_deduction') ?? 0;
                    $total_dispute_deduction = SalesDispute::whereBetween('dispute_date', [$currentMonth->format('Y-m-d'), $currentMonthEnd->format('Y-m-d')])->sum('total_deduction') ?? 0;

                    $userStandingGP = SalesOrder::whereNotNull('sale_date')
                            ->whereBetween('sale_date', [$currentMonth->format('Y-m-d'), $currentMonthEnd->format('Y-m-d')])
                            ->get()
                            ->sum(function ($order) {
                                return $order->gross_profit ?? 0;
                            });
                    $totalSales = SalesOrder::sum('charge_amount');
                    $totalSalesReturn = SalesReturn::sum('refund_received');
                    $totalSalesDispute = SalesDispute::sum('disputed_amount');
                    $currentMonthSales = SalesOrder::whereNotNull('sale_date')
                            ->whereBetween('sale_date', [$currentMonth->format('Y-m-d'), $currentMonthEnd->format('Y-m-d')])
                            ->sum('total_amount_quoted');
                    $data['targetText'] = 'Achieved';
                    $data['targetTextColor'] = '';
                    $data['targetAmount'] = \Auth::user()->priceFormat($currentMonthSales, 2);
                } else {
                    $total_sales_return_deduction = SalesReturn::where('user_id', \Auth::user()->id)->whereBetween('return_date', [$currentMonth->format('Y-m-d'), $currentMonthEnd->format('Y-m-d')])->sum('total_deduction') ?? 0;
                    $total_dispute_deduction = SalesDispute::where('user_id', \Auth::user()->id)->whereBetween('dispute_date', [$currentMonth->format('Y-m-d'), $currentMonthEnd->format('Y-m-d')])->sum('total_deduction') ?? 0;
                    $userStandingGP = SalesOrder::where('sales_user_id', $currentUserId)
                            ->whereNotNull('sale_date')
                            ->whereBetween('sale_date', [$currentMonth->format('Y-m-d'), $currentMonthEnd->format('Y-m-d')])
                            ->get()
                            ->sum(function ($order) {
                                return $order->gross_profit ?? 0;
                            });
                    $totalSales = SalesOrder::where('sales_user_id', $currentUserId)->sum('charge_amount');
                    $totalSalesReturn = SalesReturn::where('sales_user_id', $currentUserId)->sum('refund_received');
                    $totalSalesDispute = SalesDispute::where('sales_user_id', $currentUserId)->sum('disputed_amount');
                    $currentMonthSales = SalesOrder::where('sales_user_id', $currentUserId)
                            ->whereNotNull('sale_date')
                            ->whereBetween('sale_date', [$currentMonth->format('Y-m-d'), $currentMonthEnd->format('Y-m-d')])
                            ->sum('total_amount_quoted');
                    $targetPending = max(0, $monthlyTarget - ($currentMonthSales ?? 0));
                    $data['targetText'] = 'Pending';
                    $data['targetTextColor'] = ($monthlyTarget < $targetPending) ? 'text-success' : 'text-danger';
                    $data['targetAmount'] = \Auth::user()->priceFormat($targetPending, 2);
                }
                $totalDeduction = $total_sales_return_deduction + $total_dispute_deduction;
                $totalStandingGP = $userStandingGP - $totalDeduction;
                // Your Standing GP - Current user's gross profit this month
                $data['standingGP'] = \Auth::user()->priceFormat($totalStandingGP ?? 0, 2);
                // Total Sales - All time total charge amount
                $data['totalSales'] = \Auth::user()->priceFormat($totalSales ?? 0, 2);
                $data['totalSalesReturn'] = \Auth::user()->priceFormat($totalSalesReturn ?? 0, 2);
                $data['totalSalesDispute'] = \Auth::user()->priceFormat($totalSalesDispute ?? 0, 2);

                $data['target'] = $users = User::find(\Auth::user()->creatorId());
                return view('home', compact('data', 'users'));
            }
        } else {

            if (!file_exists(storage_path() . "/installed")) {
                header('location:install');
                die;
            } else {
                $settings = Utility::settings();
                if ($settings['display_landing_page'] == 'on' && \Schema::hasTable('landing_page_settings')) {
                    $plans = Plan::get();

                    $get_section = LandingPageSections::orderBy('section_order', 'ASC')->get();

                    return view('landingpage::layouts.landingpage', compact('plans', 'get_section'));
                } else {
                    return redirect('login');
                }
            }
        }
    }

    public function getOrderChart($arrParam) {
        $arrDuration = [];
        if ($arrParam['duration']) {
            if ($arrParam['duration'] == 'week') {
                $previous_week = strtotime("-2 week +1 day");
                for ($i = 0; $i < 14; $i++) {
                    $arrDuration[date('Y-m-d', $previous_week)] = date('d-M', $previous_week);
                    $previous_week = strtotime(date('Y-m-d', $previous_week) . " +1 day");
                }
            }
        }

        $arrTask = [];
        $arrTask['label'] = [];
        $arrTask['data'] = [];
        foreach ($arrDuration as $date => $label) {

            $data = Order::select(\DB::raw('count(*) as total'))->whereDate('created_at', '=', $date)->first();
            $arrTask['label'][] = $label;
            $arrTask['data'][] = $data->total;
        }

        return $arrTask;
    }

    public function calendarData($calenderdata = 'all') {
        $calls = Call::where('created_by', \Auth::user()->creatorId())->get();
        $meetings = Meeting::where('created_by', \Auth::user()->creatorId())->get();
        $tasks = Task::where('created_by', \Auth::user()->creatorId())->get();

        $arrMeeting = [];
        $arrTask = [];
        $arrCall = [];

        if ($calenderdata == 'call') {
            foreach ($calls as $call) {
                $arr['id'] = $call['id'];
                $arr['title'] = $call['name'];
                $arr['start'] = $call['start_date'];
                $arr['end'] = $call['end_date'];
                $arr['className'] = 'event-primary';
                $arr['url'] = route('call.show', $call['id']);
                $arrCall[] = $arr;
            }
        } elseif ($calenderdata == 'task') {
            foreach ($tasks as $task) {
                $arr['id'] = $task['id'];
                $arr['title'] = $task['name'];
                $arr['start'] = $task['start_date'];
                $arr['end'] = $task['due_date'];
                $arr['className'] = 'event-success';
                $arr['url'] = route('task.show', $task['id']);
                $arrTask[] = $arr;
            }
        } elseif ($calenderdata == 'meeting') {
            foreach ($meetings as $meeting) {
                $arr['id'] = $meeting['id'];
                $arr['title'] = $meeting['name'];
                $arr['start'] = $meeting['start_date'];
                $arr['end'] = $meeting['end_date'];
                $arr['className'] = 'event-info';
                $arr['url'] = route('meeting.show', $meeting['id']);
                $arrMeeting[] = $arr;
            }
        } else {
            foreach ($calls as $call) {
                $arr['id'] = $call['id'];
                $arr['title'] = $call['name'];
                $arr['start'] = $call['start_date'];
                $arr['end'] = $call['end_date'];
                $arr['className'] = 'event-primary';
                $arr['url'] = route('call.show', $call['id']);
                $arrCall[] = $arr;
            }
            foreach ($tasks as $task) {
                $arr['id'] = $task['id'];
                $arr['title'] = $task['name'];
                $arr['start'] = $task['start_date'];
                $arr['end'] = $task['due_date'];
                $arr['className'] = 'event-success';
                $arr['url'] = route('task.show', $task['id']);
                $arrTask[] = $arr;
            }
            foreach ($meetings as $meeting) {
                $arr['id'] = $meeting['id'];
                $arr['title'] = $meeting['name'];
                $arr['start'] = $meeting['start_date'];
                $arr['end'] = $meeting['end_date'];
                $arr['className'] = 'event-info';
                $arr['url'] = route('meeting.show', $meeting['id']);
                $arrMeeting[] = $arr;
            }
        }

        $calandar = array_merge($arrCall, $arrMeeting, $arrTask);
        return str_replace('"[', '[', str_replace(']"', ']', json_encode($calandar)));
    }

    public function get_data(Request $request) {
        $arrMeeting = [];
        $arrTask = [];
        $arrCall = [];

        if ($request->get('calender_type') == 'goggle_calender') {
            if ($type = 'task') {
                $arrTask = Utility::getCalendarData($type);
            }

            if ($type = 'meeting') {
                $arrMeeting = Utility::getCalendarData($type);
            }

            if ($type = 'call') {
                $arrCall = Utility::getCalendarData($type);
            }

            $arrayJson = array_merge($arrCall, $arrMeeting, $arrTask);
        } else {

            $arrMeeting = [];
            $arrTask = [];
            $arrCall = [];

            $calls = Call::get();
            $meetings = Meeting::get();
            $tasks = Task::get();

            foreach ($tasks as $val) {

                $end_date = date_create($val->end_date);
                date_add($end_date, date_interval_create_from_date_string("1 days"));
                $arrTask[] = [
                    "id" => $val->id,
                    "title" => $val->name,
                    "start" => $val->start_date,
                    "end" => date_format($end_date, "Y-m-d H:i:s"),
                    "className" => $val->color,
                    "textColor" => '#FFF',
                    "url" => route('task.show', $val['id']),
                    "allDay" => true,
                ];
            }
            foreach ($meetings as $val) {

                $end_date = date_create($val->end_date);
                date_add($end_date, date_interval_create_from_date_string("1 days"));
                $arrMeeting[] = [
                    "id" => $val->id,
                    "title" => $val->name,
                    "start" => $val->start_date,
                    "end" => date_format($end_date, "Y-m-d H:i:s"),
                    "className" => $val->color,
                    "textColor" => '#FFF',
                    "url" => route('meeting.show', $val['id']),
                    "allDay" => true,
                ];
            }
            foreach ($calls as $val) {

                $end_date = date_create($val->end_date);
                date_add($end_date, date_interval_create_from_date_string("1 days"));
                $arrCall[] = [
                    "id" => $val->id,
                    "title" => $val->name,
                    "start" => $val->start_date,
                    "end" => date_format($end_date, "Y-m-d H:i:s"),
                    "className" => $val->color,
                    "textColor" => '#FFF',
                    "url" => route('call.show', $val['id']),
                    "allDay" => true,
                ];
            }
            $arrayJson = array_merge($arrCall, $arrMeeting, $arrTask);
        }
        return $arrayJson;
    }
}
