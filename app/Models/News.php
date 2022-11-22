<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    public const DRAFT = 'DRAFT';
    public const ACTIVE = 'ACTIVE';
    public const BLOCKED = 'BLOCKED';

    protected $table = 'news';

    public static array $selectedFiled = [
        'id',
        'category_id',
        'title',
        'author',
        'status',
        'image',
        'description',
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'category_id',
        'title',
        'author',
        'status',
        'image',
        'description',
    ];
}
