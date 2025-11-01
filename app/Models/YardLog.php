<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YardLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'sales_order_id',
        'yard_id',
        'action',
        'description',
        'data',
        'is_completed',
        'created_by',
        'completed_at'
    ];

    protected $casts = [
        'data' => 'array',
        'is_completed' => 'boolean',
        'completed_at' => 'datetime'
    ];

    // Relationships
    public function salesOrder()
    {
        return $this->belongsTo('App\Models\SalesOrder','sales_order_id');
    }

    public function yard()
    {
        return $this->belongsTo('App\Models\Yard','yard_id');
    }

    public function createdBy()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }

    // Helper methods
    public function markAsCompleted()
    {
        $this->update([
            'is_completed' => true,
            'completed_at' => now()
        ]);
    }

    public function markAsIncomplete()
    {
        $this->update([
            'is_completed' => false,
            'completed_at' => null
        ]);
    }
}
