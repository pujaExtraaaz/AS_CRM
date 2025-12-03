<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesDispute extends Model {

//    use HasFactory;
    protected $table = 'sales_dispute';
    protected $fillable = [
        'user_id',
        'salesorder_id',
        'dispute_id',
        'dispute_date',
        'dispute_type',
        'dispute_status',
        'disputed_amount',
        'gp_deduction',
        'loss',
        'total_deduction',
        'reason',
        'created_by',
    ];

    public function source_user() {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function sales_order() {
        return $this->hasOne('App\Models\SalesOrder', 'id', 'salesorder_id');
    }
}
