<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 *
 *
 * @property User $user
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $description
 * @property string|null $statblock
 * @property string $added_at
 * @property Carbon|null $deleted_at
 * @property-read Collection<int, Comment> $comments
 * @property-read int|null $comments_count
 * @property-read Collection<int, Vote> $votes
 * @property-read int|null $votes_count
 * @method static Builder|Creature newModelQuery()
 * @method static Builder|Creature newQuery()
 * @method static Builder|Creature onlyTrashed()
 * @method static Builder|Creature query()
 * @method static Builder|Creature whereAddedAt($value)
 * @method static Builder|Creature whereDeletedAt($value)
 * @method static Builder|Creature whereDescription($value)
 * @method static Builder|Creature whereId($value)
 * @method static Builder|Creature whereName($value)
 * @method static Builder|Creature whereStatblock($value)
 * @method static Builder|Creature whereUserId($value)
 * @method static Builder|Creature withTrashed()
 * @method static Builder|Creature withoutTrashed()
 * @mixin Eloquent
 */
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
