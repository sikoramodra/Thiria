<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


/**
 * Klasa typu model reprezentująca pisemne publikacje użytkowników.
 *
 * @property int $id
 * @property int $author_id
 * @property string $title
 * @property string $content
 *
 * @property User $author
 */
class Publication extends Model {
    protected $fillable = [
        'title', 'content', 'author_id'
    ];

    protected $dates = [
        'created_at'
    ];

    protected $table = 'publication';

    public function author(): BelongsTo {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function comments(): HasMany {
        return $this->hasMany(Comment::class, 'publication_id');
    }

    protected function excerpt(): Attribute {
        return Attribute::make(
            get: fn() => strlen($this->content) > 60 ? substr(
                    $this->content, 0, 60
                ) . '...' : $this->content,
        );
    }
}
