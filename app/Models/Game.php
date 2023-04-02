<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    use HasFactory;

    protected $table = 'games';

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'game_id');
    }

    public function devices(): BelongsTo
    {
        return $this->belongsTo(Device::class, 'device');
    }

    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
