<?php

namespace App\Article\Services;

use App\Article\DTOs\ArticleCreateDTO;
use App\Article\DTOs\ArticleUpdateDTO;
use App\Common\Models\Article;
use App\Common\Models\User;

class ArticleServices
{

    public function createArticle(ArticleCreateDTO $dto, User $user): Article
    {
        $article = new Article();

        $article->title = $dto->title;
        $article->text = $dto->text;
        $article->author = $user->id;
        $article->sub_only = $dto->sub_only;

        $article->save();

        return $article;
    }

    public function updateArticle(ArticleUpdateDTO $dto, User $user, $id): Article
    {
        $article = Article::find($id);

        $article->title = $dto->title;
        $article->text = $dto->text;
        $article->sub_only = $dto->sub_only;

        $article->save();

        return $article;
    }

}
