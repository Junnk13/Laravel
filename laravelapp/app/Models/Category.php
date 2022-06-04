<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";


    protected $fillable = [
        'title',
    ];

    public function news(): HasMany
    {
        return $this->hasMany(News::class,
            'category_id', 'id');
    }
}
