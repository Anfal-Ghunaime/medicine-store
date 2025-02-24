<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function med(): BelongsTo
    {
        return $this->belongsTo(Med::class);
    }

    protected $fillable = [
        'user_id',
        'med_id',
        'name',
        'image',
        'quantity'
    ];
}
