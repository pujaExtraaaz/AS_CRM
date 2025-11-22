<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class SalesOrder extends Model {

    protected $fillable = [
        //        'sale_invoice_number',
        'sale_date',
        'sale_status',
        'lead_id',
        'yard_id',
        'sales_user_id',
        'source_id',
        'source_date',
        'vin_number',
        'part_number',
        'part_type',
        'source_type',
        'billing_address_text',
        'billing_country',
        'billing_state',
        'billing_city',
        'billing_zipcode',
        'shipping_address_text',
        'shipping_country',
        'shipping_state',
        'shipping_city',
        'shipping_zipcode',
        'payment_gateway_name',
        'name_on_card',
        'card_number',
        'expiration',
        'cvv_number',
        'part_price',
        'shipping_price',
        'gross_profit',
        'charge_amount',
        'total_amount_quoted',
        'agent_note',
        'yard_order_date',
        'comment',
        'card_used',
        'tracking_no',
        'delivery_date',
        'created_at',
        'updated_at',
        'ote_name',
        'opportunity_name',
    ];
    public static $status = [
        'Open',
        'Not Paid',
        'Partialy Paid',
        'Paid',
        'Cancelled',
    ];

    public function assign_user() {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function accounts() {
        return $this->hasOne('App\Models\Account', 'id', 'account');
    }

    public function quotes() {

        return $this->hasOne('App\Models\Quote', 'id', 'quote');
    }

    public function taxs() {
        return $this->hasOne('App\Models\ProductTax', 'id', 'tax');
    }

    public function opportunitys() {
        return $this->hasOne('App\Models\Opportunities', 'id', 'opportunity');
    }

    public function contacts() {
        return $this->hasOne('App\Models\Contact', 'id', 'billing_contact');
    }

    public function shipping_providers() {
        return $this->hasOne('App\Models\ShippingProvider', 'id', 'shipping_provider');
    }

    public function getaccount($type, $id) {
        $parent = Account::find($id)->name;

        return $parent;
    }

    public function itemsdata() {
        return $this->hasMany('App\Models\SalesOrderItem', 'salesorder_id', 'id');
    }

    public function getSubTotal() {
        $subTotal = 0;
        foreach ($this->itemsdata as $product) {
            $subTotal += ($product->price * $product->quantity);
        }

        return $subTotal;
    }

    public function getTotalTax() {
        $totalTax = 0;
        foreach ($this->itemsdata as $product) {
            $taxes = Utility::totalTaxRate($product->tax);

            $totalTax += ($taxes / 100) * ($product->price * $product->quantity);
        }

        return $totalTax;
    }

    public function getTotalDiscount() {
        $totalDiscount = 0;
        foreach ($this->itemsdata as $product) {
            $totalDiscount += $product->discount;
        }

        return $totalDiscount;
    }

    public function getTotal() {
        return ($this->getSubTotal() + $this->getTotalTax()) - $this->getTotalDiscount();
    }

    public function getUserIdNameAttribute() {
        $user_id = SalesOrder::find($this->user_id);

        return $this->attributes['user_id_name'] = !empty($user_id) ? $user_id->name : '';
    }

    public function getQuoteNameAttribute() {
        $quote = SalesOrder::find($this->quote_id);

        return $this->attributes['quote_name'] = !empty($quote) ? $quote->name : '';
    }

    public function getOpportunityNameAttribute() {
        $opportunity = SalesOrder::find($this->opportunity);

        return $this->attributes['opportunity_name'] = !empty($opportunity) ? $opportunity->name : '';
    }

    public static function statuss($status) {
        if ($status == 0) {
            $status = 'Open';
        } elseif ($status == 1) {
            $status = 'Not Paid';
        } elseif ($status == 2) {
            $status = 'Partialy Paid';
        } elseif ($status == 3) {
            $status = 'Paid';
        } elseif ($status == 4) {
            $status = 'Cancelled';
        }


        return $status;
    }

    public function getStatusNameAttribute() {

        $status = SalesOrder::$status[$this->status];

        return $this->attributes['status_name'] = $status;
    }

    public static function Users($user_id) {

        $userArr = explode(',', $user_id);

        $user = 0;
        foreach ($userArr as $user) {
            $users = User::find($user);

            // $username=$users->name;
            $username = !empty($users) ? $users->name : 0;
        }


        return $username;
    }

    public static function opportunity($opportunity) {
        $opportunityArr = explode(',', $opportunity);

        $opportunity = 0;
        foreach ($opportunityArr as $opportunity) {
            $opportunitys = Opportunities::find($opportunity);
            $opportunityname = $opportunitys->name;
        }


        return $opportunityname;
    }

    public static function account($account) {
        $accountArr = explode(',', $account);

        $account = 0;
        foreach ($accountArr as $account) {
            $accounts = Opportunities::find($account);

            $accountname = $accounts->name;
        }


        return $accountname;
    }

    public static function contact($contact) {
        $contactArr = explode(',', $contact);

        $contact = 0;
        foreach ($contactArr as $contact) {
            $contacts = Contact::find($contact);

            $contactname = $contacts->name;
        }


        return $contactname;
    }

    public static function Tax($tax) {

        $taxArr = explode(',', $tax);

        $tax = 0;
        foreach ($taxArr as $tax) {
            $taxs = ProductTax::find($tax);

            $taxname = $taxs->tax_name;
        }


        return $taxname;
    }

    public static function shippingprovider($shippingprovider) {

        $shippingproviderArr = explode(',', $shippingprovider);

        $shippingprovider = 0;
        foreach ($shippingproviderArr as $shippingprovider) {
            $shippingproviders = ShippingProvider::find($shippingprovider);

            $shippingprovidername = $shippingproviders->name;
        }


        return $shippingprovidername;
    }

    public function lead() {
        return $this->belongsTo('App\Models\Lead', 'lead_id');
    }

    public function yard() {
        return $this->belongsTo('App\Models\Yard', 'yard_id');
    }

    public function salesUser() {
        return $this->belongsTo('App\Models\User', 'sales_user_id', 'id');
    }

    public function sourceAgent() {
        return $this->belongsTo('App\Models\User', 'source_id');
    }

    public function yardLogs() {
        return $this->hasMany('App\Models\YardLog', 'sales_order_id');
    }

    public function leadType() {
        return $this->belongsTo('App\Models\LeadType', 'lead_type_id');
    }

    public function sourceType() {
        return $this->hasOne('App\Models\LeadSource', 'id', 'source_type');
    }
}
