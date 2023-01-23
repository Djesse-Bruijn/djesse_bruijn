<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static latest()
 * @method static create(array $all)
 */
class Posts extends Model
{
    use HasFactory;

    protected $table = 'post';
    public $timestamps = true;

    protected $casts = [
        'cost' => 'float'
    ];

    protected $fillable = [
        'title',
        'text',
        'author',
    ];
}
