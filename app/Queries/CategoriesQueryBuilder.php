<?php

declare(strict_types=1);

namespace App\Queries;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

final class CategoriesQueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = Category::query();
    }

    public function getCategories(): Collection
    {
        return $this->model
            ->orderBy('id', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function create(array $date): Category|bool
    {
        return Category::create($date);
    }

    public function update(Category $category, array $date): bool
    {
        return $category->fill($date)->save();
    }
}
