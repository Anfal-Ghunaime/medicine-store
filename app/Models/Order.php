<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    public function ordermed(): HasMany
    {
        return $this->hasMany(OrderMed::class);
    }

    public function meds(): BelongsToMany
    {
        return $this->belongsToMany(Med::class)->withPivot('warehouse_id');
    }

    public function pharmacist(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'pharmacist_id',
        'warehouse_id',
        'total_price',
        'delivery_status',
        'payment_status',
        'quantity_updated',
        'delivered_at'
    ];

    protected $casts = [
        'delivery_status' => 'string',
        'payment_status' => 'string',
        'delivered_at' => 'datetime',
    ];
}
