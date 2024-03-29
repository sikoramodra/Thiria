<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vote extends Model {
    use HasFactory;

    protected $table = 'vote';
    public $timestamps = false;

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function creature(): BelongsTo {
        return $this->belongsTo(Creature::class, 'creature_id');
    }
}
