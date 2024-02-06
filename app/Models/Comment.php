<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Klasa typu model reprezentująca pisemne komentarze użytkowników.
 *
 * @property int $id
 * @property int $author_id
 * @property int $publication_id
 * @property int $parent_id
 * @property string $content
 *
 * @property User $author
 * @property Publication $publication
 */
class Comment extends Model {
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'author_id','publication_id', 'parent_id','content'
    ];

    protected $table = 'comment';

    public function author(): BelongsTo {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function replies(): HasMany {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
