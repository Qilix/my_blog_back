<?php

namespace App\Article\Presenters;

use App\Article\Resources\ArticleDetailResource;
use App\Common\Models\Article;
use App\Comment\Presenters\CommentPresenter;


class ArticleDetailPresenter
{
    public function __construct(protected CommentPresenter $commentPresenter)
    {
    }

    public function present(Article $article): ArticleDetailResource
    {
        $resource = new ArticleDetailResource();

        $resource->id = $article->id;
        $resource->title = $article->title;
        $resource->text = $article->text;
        $resource->author = $article->user->name;
        $resource->sub_only = $article->sub_only;
        $resource->created_at = $article->created_at;
        $resource->updated_at = $article->updated_at;
        $resource->comments = $this->commentPresenter->collect($article->comments);

        return $resource;
    }
}
