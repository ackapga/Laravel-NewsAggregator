<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;

    public const DRAFT = 'DRAFT';
    public const ACTIVE = 'ACTIVE';
    public const BLOCKED = 'BLOCKED';

    protected $table = 'news';

    protected $fillable = [
        'category_id',
        'title',
        'author',
        'status',
        'image',
        'description',
    ];

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

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
