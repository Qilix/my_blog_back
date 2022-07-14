<?php

namespace App\Article\Presenters;

use App\Article\Resources\ArticleResource;
use App\Common\Models\Article;
use Illuminate\Database\Eloquent\Collection;

class ArticlePresenter
{

    public function present(Article $article): ArticleResource
    {
        $resource = new ArticleResource();

        $resource->id = $article->id;
        $resource->title = $article->title;
        $resource->author = $article->user->name;
        $resource->sub_only = $article->sub_only;
        $resource->created_at = $article->created_at;
        $resource->updated_at = $article->updated_at;

        return $resource;
    }

    public function collect(Collection $articles): array
    {
        return $articles->map(function (Article $article) {
            return $this->present($article);
        })->toArray();
    }
}
