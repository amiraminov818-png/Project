<?php

namespace App\Models;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property string $name
 * @property carbon $created_at
 * @property carbon $updated_at
 */

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Role extends Model
{

    protected $fillable = [
        'name'
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
