<?php

namespace App\Comment\Services;

use App\Comment\DTOs\CommentCreateDTO;
use App\Comment\DTOs\CommentUpdateDTO;
use App\Comment\Queries\CommentQueries;
use App\Common\Models\Comment;
use App\Common\Models\User;

class CommentServices
{

    public function createComment(CommentCreateDTO $dto, $user, $article_id): Comment
    {
        $comment = new Comment();

        $comment->body = $dto->body;
        $comment->article_id = $article_id;
        $comment->author = $user->id;

        $comment->save();

        return $comment;
    }

    public function updateComment($comment_id, CommentQueries $quaries,CommentUpdateDTO $dto, $user): Comment
    {
        $comment = $quaries->getDetail($comment_id, $user);

        $comment->body = $dto->body;

        $comment->save();

        return $comment;
    }

    public function deleteComment($comment_id, CommentQueries $queries, $user)
    {
        $comment = $queries->getDetail($comment_id, $user);

        $comment->delete();
    }
}
