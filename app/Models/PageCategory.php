<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PageCategory extends Model
{
    use HasFactory;

    protected $table = 'pages_categories';

    public function pages(): HasMany
    {
        return $this->hasMany(Pages::class, 'category_id');
    }
}
