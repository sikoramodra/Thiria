<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model {
    use HasFactory;

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
