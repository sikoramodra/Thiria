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
 * @property int|null $comment_id
 * @property int $user_id
 * @property int $creature_id
 * @property string $text
 * @property string $added_at
 * @property Carbon|null $deleted_at
 * @property-read Creature $creature
 * @property-read Collection<int, Comment> $replies
 * @property-read int|null $replies_count
 * @method static Builder|Comment newModelQuery()
 * @method static Builder|Comment newQuery()
 * @method static Builder|Comment onlyTrashed()
 * @method static Builder|Comment query()
 * @method static Builder|Comment whereAddedAt($value)
 * @method static Builder|Comment whereCommentId($value)
 * @method static Builder|Comment whereCreatureId($value)
 * @method static Builder|Comment whereDeletedAt($value)
 * @method static Builder|Comment whereId($value)
 * @method static Builder|Comment whereText($value)
 * @method static Builder|Comment whereUserId($value)
 * @method static Builder|Comment withTrashed()
 * @method static Builder|Comment withoutTrashed()
 * @mixin Eloquent
 */
class Comment extends Model {
    use HasFactory, SoftDeletes;

    protected $table = 'comment';

    protected $fillable = [
        'comment_id',
        'user_id',
        'creature_id',
        'text',
    ];

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
