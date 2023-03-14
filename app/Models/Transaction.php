<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function games(): BelongsTo
    {
        return $this->belongsTo(Game::class, 'game_id');
    }

    public function seller(): BelongsTo
    {
        return $this->belongsTo(User::class, 'seller_user_id');
    }

    public function buyer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'buyer_user_id');
    }
}
