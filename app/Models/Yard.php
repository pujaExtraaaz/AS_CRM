<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yard extends Model
{
    use HasFactory;

    protected $fillable = [
        'yard_name',
        'yard_address',
        'contact',
        'yard_email',
        'yard_person_name',
        'created_by',
    ];

   public function yardlogs()
    {
        return $this->belongsTo('App\Models\YardLog','yard_id');
    }
}
