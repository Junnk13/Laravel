<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Sourses;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class QueryBuilderSourses implements QueryBuilder
{
    public function getBuilder(): Builder
    {
        return Sourses::query();
    }
    public function getSourses(): LengthAwarePaginator
    {
        return Sourses::select(['id', 'user_name', 'user_email','url','created_at'])
            ->paginate(10);
    }
}
