<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderMed extends Model
{
    use HasFactory;

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function med(): HasOne
    {
        return $this->hasOne(Med::class);
    }

    protected $fillable = [
      'order_id',
      'med_id',
      'quantity'
    ];
}
