<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int $id
 * @property int $title
 * @property int|null $content
 * @property int $user_id
 * @property \illuminate\Support\Carbon $created_at
 */

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
            'id',
            'title',
            'content',
            'user_id'
        ];

    protected $casts = [
            'user_id' => 'integer',
            'created_at' => 'datetime',
        ];
}


