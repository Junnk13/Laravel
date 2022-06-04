<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\News;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class QueryBuilderNews implements QueryBuilder
{

    public function getBuilder(): Builder
    {
        return News::query();
    }

    public function getNews(): LengthAwarePaginator
    {
        return News::with('category')->paginate(10);
    }

    public function getCurrentNews(int $id)
    {
        return News::select(['id', 'title', 'author', 'image', 'full_description', 'created_at'])->find($id);
    }

    public function getNewsById(int $idCategory)
    {
        return News::select(['id', 'title', 'author', 'image', 'short_description', "full_description", 'created_at', 'status'])
            ->where('category_id', '=', $idCategory)->get();
    }
}
