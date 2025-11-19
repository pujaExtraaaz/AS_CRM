<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVisitDetails extends Model {

    use HasFactory;

    protected $fillable = [
        'user_id',
        'lead_id',
        'latitude',
        'longitude',
        'area_name',
        'visiting_place',
        'person_name',
        'reason',
        'photo',
    ];

    public function getLead() {
        return $this->hasOne('App\Models\Lead', 'id', 'lead_id');
    }
}
