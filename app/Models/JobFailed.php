<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class JobFailed extends Model
{
    use HasFactory;

    private Builder $model;

    protected $table = 'failed_jobs';

}
