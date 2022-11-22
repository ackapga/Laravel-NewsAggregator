<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public static array $selectedFiled = [
        'id',
        'title',
        'description',
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'title',
        'description',
    ];

}
