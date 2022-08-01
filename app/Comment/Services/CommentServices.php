<?php

namespace App\Comment\Services;

use App\Comment\DTOs\CommentCreateDTO;
use App\Comment\DTOs\CommentUpdateDTO;
use App\Comment\Queries\CommentQueries;
use App\Common\Models\Comment;
use App\Common\Models\User;

class CommentServices
{

    public function createComment(CommentCreateDTO $dto, User $user): Comment
    {
        $comment = new Comment();

        $comment->body = $dto->body;
        $comment->article_id = $dto->article_id;
        $comment->author = $user->id;

        $comment->save();

        return $comment;
    }

    public function updateComment($id, CommentQueries $quaries,CommentUpdateDTO $dto, User $user): Comment
    {
        $comment = $quaries->getDetail($id);

        $comment->body = $dto->body;
        $comment->article_id = $dto->article_id;

        $comment->save();

        return $comment;
    }

}
