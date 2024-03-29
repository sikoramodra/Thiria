<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $user_id
 */
class Admin extends Model {
    use HasFactory;

    protected $table = 'admin';
    public $timestamps = false;

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }
}
