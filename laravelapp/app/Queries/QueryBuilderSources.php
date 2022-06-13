<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Sources;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class QueryBuilderSources implements QueryBuilder
{
    public function getBuilder(): Builder
    {
        return Sources::query();
    }
    public function getSources(): LengthAwarePaginator
    {
        return Sources::select(['id', 'user_name', 'user_email','url','created_at'])
            ->paginate(10);
    }
}
