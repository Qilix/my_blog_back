<?php

namespace App\Common\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $guarded = [];
    protected $fillable = ['article_id'];

    use HasFactory;

    public function article()
    {
        return $this->hasOne(Article::class, 'id', 'article_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'author');
    }
}
