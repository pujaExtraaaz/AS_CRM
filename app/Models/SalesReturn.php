<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesReturn extends Model {

//    use HasFactory;
    protected $table = 'sales_return';
    protected $fillable = [
        'user_id',
        'lead_id',
        'salesorder_id',
        'salesreturn_id',
        'salesreturn_tracknumber',
        'case_status',
        'request_type',
        'refund_received',
        'refund_issued',
        'gp_deduction',
        'loss',
        'total_deduction',
        'reason',
        'return_date',
        'created_by',
    ];
    public static $request_type = [
        'Return Label',
        'Full Return',
        'Partial Refund',
    ];
    public static $case_status = [
        'Open' => 'Open',
        'Close' => 'Close',
    ];

    public function source_user() {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function sales_order() {
        return $this->hasOne('App\Models\SalesOrder', 'id', 'salesorder_id');
    }

    public function lead() {
        return $this->hasOne('App\Models\Lead', 'id', 'lead_id');
    }

//    public function sales_invoice() {
//        return $this->hasOne('App\Models\SalesInvoice', 'id', 'user_id');
//    }
}
