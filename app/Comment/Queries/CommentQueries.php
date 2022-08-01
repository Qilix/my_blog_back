<?php

namespace App\Comment\Queries;

use App\Common\Models\Comment;
use Illuminate\Database\Eloquent\Collection;

class CommentQueries
{
    public function get(): Collection
    {
        return Comment::all();
    }

    public function getDetail($id): Comment
    {
        return Comment::with('comments')->findOrFail($id);
    }

    public function getAuthorDetail($id, User $user): Comment{
        $author = Comment::findOrFail($id)->where('author', $user);
        if (!$author){
            return dd("error");
        }
        return Comment::with('comments')->findOrFail($id);
    }
}
