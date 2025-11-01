<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $fillable = [
        'year',
        'make',
        'model',
        'part_name',
        'is_active',
    ];
    protected $appends = [];
    public static $status = [
        1 => 'Active',
        0 => 'Inactive',
    ];
}
