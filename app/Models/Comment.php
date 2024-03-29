<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model {
    use HasFactory, SoftDeletes;

    protected $table = 'comment';

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function replies(): HasMany {
        return $this->hasMany(Comment::class, 'comment_id');
    }

    public function creature(): BelongsTo {
        return $this->belongsTo(Creature::class, 'creature_id');
    }
}
