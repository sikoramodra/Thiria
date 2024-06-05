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
 * @property int $id
 * @property int $user_id
 * @property int $creature_id
 * @property string $vote
 * @property-read Creature $creature
 * @property-read User $user
 * @method static Builder|Vote newModelQuery()
 * @method static Builder|Vote newQuery()
 * @method static Builder|Vote query()
 * @method static Builder|Vote whereCreatureId($value)
 * @method static Builder|Vote whereId($value)
 * @method static Builder|Vote whereUserId($value)
 * @method static Builder|Vote whereVote($value)
 * @mixin Eloquent
 */
class Vote extends Model {
    use HasFactory;

    protected $table = 'vote';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'creature_id',
        'vote',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function creature(): BelongsTo {
        return $this->belongsTo(Creature::class, 'creature_id');
    }
}
