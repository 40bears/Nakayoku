<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Device extends Model
{
    use HasFactory;

    protected $table = 'devices';

    public function games(): HasMany
    {
        return $this->hasMany(Game::class, 'device');
    }
}
