<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 *
 * @property int $user_id
 * @property-read User $user
 * @method static Builder|Admin newModelQuery()
 * @method static Builder|Admin newQuery()
 * @method static Builder|Admin query()
 * @method static Builder|Admin whereUserId($value)
 * @mixin Eloquent
 */
class Admin extends Model {
    use HasFactory;

    protected $table = 'admin';
    public $timestamps = false;

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }
}
