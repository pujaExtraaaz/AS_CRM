<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadStatuses extends Model {

    use HasFactory;

    protected $fillable = [
        'lead_id',
        'lead_status',
        'created_by',
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function lead() {
        return $this->belongsTo('App\Models\Lead', 'lead_id', 'id');
    }

    public function creator() {
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }
}
