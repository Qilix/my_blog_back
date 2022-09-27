<?php

namespace App\Article\Queries;

use App\Common\Models\Article;

class ArticleQueries
{
    public function get()
    {
        $data = Article::orderBy('id', 'desc')->paginate(3);
        return $data;

    }

    public function getDetail($id): Article
    {
        return Article::with(['comments' => function($query){
            $query->orderBy('created_at', 'desc');
    }])->findOrFail($id);

    }

    public function getAuthorDetail($id, $user): Article
    {
        $article = Article::where('author', $user->id)->findOrFail($id);
        return $article;
    }

    public function getArticlesByAuthor($user)
    {
        $data = Article::orderBy('id', 'desc')->where('author', $user->id)->paginate(5);
        return $data;
    }
}
