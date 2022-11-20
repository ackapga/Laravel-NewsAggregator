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

    protected static array $selectedFiled = ['id', 'category_id', 'title', 'author', 'status', 'image', 'description', 'created_at'];

    public function getNews(): Collection
    {
        return DB::table($this->table)->get(self::$selectedFiled);
    }

    public function getNewsById(int $id): ?object
    {
        return DB::table($this->table)->find($id, self::$selectedFiled);
    }
}
