<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class UserCheckinCheckoutDetails extends Model {

    use HasFactory;
    use HasRoles;

    protected $fillable = [
        'user_id',
        'user_name',
        'in_latitude',
        'in_longitude',
        'out_latitude',
        'out_longitude',
        'in_accuracy',
        'in_battery_percent',
        'out_accuracy',
        'out_battery_percent',
        'in_notes',
        'out_notes',
        'is_checkIn',
        'is_checkOut',
        'check_in_time',
        'check_out_time',
    ];
}
