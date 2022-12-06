<?php

declare(strict_types=1);

namespace App\Queries;

use App\Http\Requests\Users\EditRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;

final class UsersQueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = User::query();
    }

    public function getUsers(): Collection
    {
        return $this->model->get();
    }

    public function getUserById(int $id): ?object
    {
        return $this->model->findOrFail($id);
    }
}
