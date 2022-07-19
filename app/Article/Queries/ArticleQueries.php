<?php

namespace App\Article\Queries;

use App\Common\Models\Article;
use Illuminate\Database\Eloquent\Collection;

class ArticleQueries
{
    public function get(): Collection
    {
        return Article::all();
    }

    public function getDetail($id): Article
    {
        return Article::with('comments')->findOrFail($id);
    }
}
