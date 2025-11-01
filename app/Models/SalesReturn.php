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
        'request_type',
        'refund_amount',
        'reason',
        'return_date',
        'created_by',
    ];
    public static $request_type = [
        'Return Label',
        'Full Return',
        'Partial Refund',
    ];

    public function source_user() {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

//    public function sales_invoice() {
//        return $this->hasOne('App\Models\SalesInvoice', 'id', 'user_id');
//    }
}
