<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $title
 * @property string $content
 * @property boolean $is_published
 * @property boolean $is_active
 * @property int $user_id
 * @property  Carbon $created_at
 * @property  Carbon $updated_at
 */

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
            'title',
            'content',
            'user_id'
        ];

    protected $casts = [
            'is_published' => 'boolean',
            'is_active' => 'boolean'
        ];
}


