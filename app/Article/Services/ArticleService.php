<?php

namespace App\Article\Services;

use App\Article\DTOs\ArticleCreateDTO;
use App\Common\Models\Article;
use App\Common\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleService
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
}
