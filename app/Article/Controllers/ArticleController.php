<?php

namespace App\Article\Controllers;

use Illuminate\Routing\Controller;

use App\Common\Models\Article;

use App\Article\Resources\ArticleResource;
use App\Article\Resources\ArticleDetailResource;
use App\Article\Requests\ArticleCreateRequest;
use App\Article\Requests\ArticleUpdateRequest;


class ArticleController extends Controller
{
    public function index()
    {
        return ArticleResource::collection(Article::all());
    }

    public function show($id)
    {
        return new ArticleDetailResource(Article::with('comments')->findOrFail($id));
    }

    public function create(ArticleCreateRequest $request)
    {
        $createdArticle = Article::create($request->all());
        return new ArticleDetailResource($createdArticle);
    }

    public function update(ArticleUpdateRequest $request, $id)
    {
        $article = Article::find($id);
        $article->update($request->all());
        return new ArticleDetailResource($article);
    }

    public function destroy($id)
    {
        return Article::destroy($id);
    }
}
