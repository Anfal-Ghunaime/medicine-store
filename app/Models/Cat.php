<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cat extends Model
{
    use HasFactory;

    public function med(): BelongsToMany
    {
        return $this->belongsToMany(Med::class);
    }

    protected $fillable = [
        'cat',
    ];
}
