<?php

namespace App\Comment\Presenters;

use App\comment\Resources\CommentResource;
use App\Common\Models\Comment;
use Illuminate\Database\Eloquent\Collection;


class CommentPresenter
{
    public function present(Comment $comment): CommentResource
    {
        $resource = new CommentResource();

        $resource->id = $comment->id;
        $resource->body = $comment->body;
        $resource->article_id = $comment->article_id;
        $resource->author = $comment->author;
        $resource->created_at = $comment->created_at;
        $resource->updated_at = $comment->updated_at;


        return $resource;
    }

    public function collect(Collection $comments): array
    {
        return $comments->map(function (Comment $comment) {
            return $this->present($comment);
        })->toArray();
    }
}