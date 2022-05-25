<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function getNews($idCategory)
    {
        return DB::table($this->table)->select(['id', 'title','author','image','short_description', 'created_at'])
            ->where('category_id','=', $idCategory)->get();
    }
    public function getNewsById(int $id)
    {
        return DB::table($this->table)->select(['id', 'title','author','image','full_description', 'created_at'])->find($id);

    }
}
