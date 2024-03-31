<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property User $user
 * */
class Creature extends Model {
    use HasFactory, SoftDeletes;

    protected $table = 'creature';

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(): HasMany {
        return $this->hasMany(Comment::class, 'creature_id');
    }

    public function votes(): HasMany {
        return $this->hasMany(Vote::class, 'creature_id');
    }
}
