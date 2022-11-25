<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

final class NewsQueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = News::query();
    }

    public function getNews(): Collection|LengthAwarePaginator
    {
        return $this->model->paginate(config('pagination.admin.news'));
    }

    public function getNewsForList(): Collection|LengthAwarePaginator
    {
        return $this->model
            ->status()
            ->paginate(config('pagination.user.news'));
    }

    public function create(array $date): News|bool
    {
        return News::create($date);
    }

    public function update(News $news, array $date): bool
    {
        return $news->fill($date)->save();
    }
}
