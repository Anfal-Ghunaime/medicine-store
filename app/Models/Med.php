<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Med extends Model
{
    use HasFactory;

    public function warehouse(): BelongsTo
    {
        return $this->belongsTo(User::class, 'warehouse_id', 'id');
    }

    public function cat(): HasOne
    {
        return $this->hasOne(Cat::class);
    }

    public function ordermed(): BelongsToMany
    {
        return $this->belongsToMany(OrderMed::class);
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }

    public function favorite(): BelongsToMany
    {
        return $this->belongsToMany(Favorite::class);
    }

    protected $fillable = [
        'cat_id',
        'cat_name',
        'warehouse_id',
        'warehouse_name',
        't_name',
        's_name',
        'image',
        'price',
        'quantity',
        'exp_date',
        'company'
    ];

    protected $casts = [
        'exp_date' => 'datetime',
    ];
}
