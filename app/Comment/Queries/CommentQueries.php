<?php

namespace App\Comment\Queries;

use App\Common\Models\Comment;
use Illuminate\Database\Eloquent\Collection;

class CommentQueries
{

    public function getDetail($comment_id, $user): Comment
    {
        return Comment::where('author',$user->id)->findOrFail($comment_id);
    }
}
