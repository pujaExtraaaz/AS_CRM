<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartType extends Model
{
    protected $table = 'part_type';

    protected     $fillable = [
        'part_type_name',
        // 'created_by',
    ];
}
