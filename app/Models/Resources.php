<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resources extends Model
{
    use HasFactory;

    public const NEW = 'NEW';
    public const USED = 'USED';
    public const UPDATE = 'UPDATE';

    protected $table = 'resources';

    protected $fillable = [
        'id',
        'urlName',
        'status'
    ];
}
