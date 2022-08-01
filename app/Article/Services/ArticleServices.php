<?php

namespace App\Article\Services;

use App\Article\DTOs\ArticleCreateDTO;
use App\Article\DTOs\ArticleUpdateDTO;
use App\Article\Queries\ArticleQueries;
use App\Common\Models\Article;
use App\Common\Models\User;

class ArticleServices
{

    public function createArticle(ArticleCreateDTO $dto, $user): Article
    {
        $article = new Article();

        $article->title = $dto->title;
        $article->text = $dto->text;
        $article->author = $user->id;
        $article->sub_only = $dto->sub_only;

        $article->save();

        return $article;
    }

    public function updateArticle($id, ArticleQueries $quaries, ArticleUpdateDTO $dto, $user): Article
    {
        $article = $quaries->getAuthorDetail($id, $user);

        $article->title = $dto->title;
        $article->text = $dto->text;
        $article->sub_only = $dto->sub_only;

        $article->save();

        return $article;
    }

    public function deleteArticle($id, ArticleQueries $queries, User $user)
    {

        $article = $queries->getAuthorDetail($id, $user);

        $article->delete();
    }
}
