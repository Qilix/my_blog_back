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
//        $id = (int) $ide;
        return Article::with('comments')->findOrFail($id);

    }

    public function getAuthorDetail($id, $user): Article
    {
//        $id = (int) $ide;
        $article = Article::where('author', $user->id)->findOrFail($id);

        return $article;
    }
}
