<?php

namespace App\Queries;

use App\Models\Resources;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

final class ResourcesQueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = Resources::query();
    }

    public function getResources(): Collection|array
    {
        return $this->model->get();
    }

    public function create(array $date): Resources|bool
    {
        return Resources::create($date);
    }

    /**
     * @param array $date
     * @return int
     */
    public function update(array $date): int
    {
       return $this->model
           ->where('id', '=', $date['id'])
           ->update(['urlName' => $date['urlName']]);
    }

    public function delete($id)
    {
        $this->model->where('id', '=', $id)->delete();
    }

}
