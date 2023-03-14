<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pages extends Model
{
    use HasFactory;

    protected $table = 'pages';
    protected $primaryKey = 'id';

    public function categories(): BelongsTo
    {
        return $this->belongsTo(PageCategory::class, 'category_id');
    }
}
