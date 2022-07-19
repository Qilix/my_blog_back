<?php

namespace App\Common\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 * @property mixed title
 * @property mixed text
 * @property mixed author
 * @property mixed sub_only
 * @property mixed created_at
 * @property mixed updated_at
 * @property mixed comments
 */
class Article extends Model
{

    protected $guarded = [];

    use HasFactory;

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'author');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'article_id');
    }
}
