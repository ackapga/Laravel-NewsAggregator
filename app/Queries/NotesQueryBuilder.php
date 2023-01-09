<?php

declare(strict_types=1);

namespace App\Queries;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

use App\Models\Note;

final class NotesQueryBuilder
{
    private Builder $model;

    public function __construct()
    {
        $this->model = Note::query();
    }

    public function getNotes(): Collection|array
    {
        return $this->model->get();
    }

    public function create(array $date): Note|bool
    {
        return Note::create($date);
    }

    public function update(Note $note, array $date): bool
    {
        return $note->fill($date)->save();
    }

}
