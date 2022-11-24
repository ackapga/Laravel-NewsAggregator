<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

final class NewsQueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = News::query();
    }

    public function getNews(): Collection
    {
        return $this->model->get();
    }

    public function getNewsForList(): Collection
    {
        return $this->model
            ->where('status', News::ACTIVE)
            ->orWhere('status', News::DRAFT)
            ->get();
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
