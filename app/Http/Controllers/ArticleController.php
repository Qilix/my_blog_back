<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Http\Resources\ArticleDetailResource;
use App\Http\Requests\ArticleCreateRequest;
use App\Models\Article;
use Illuminate\Routing\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

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
        $createdArticle = Article::create($request->validated());

        return new ArticleDetailResource($createdArticle);
    }

    public function update(ArticleCreateRequest $request, $id)
    {

        $article = Article::find($id);
        $article->update($request->validated());
        return new ArticleDetailResource($article);
    }

    public function destroy($id)
    {
        return Article::destroy($id);
    }
}
