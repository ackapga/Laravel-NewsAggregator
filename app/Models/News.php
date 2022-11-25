<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    /**
     * ScopeStatus
     * @param Builder $query
     * @return Builder
     */
    public function scopeStatus(Builder $query): Builder
    {
        return $query->where('status', News::ACTIVE)
            ->orWhere('status', News::DRAFT);
    }
}
