<?php

namespace App\Article\Controllers;

use App\Common\Models\Article;

use App\Article\Factories\ArticleCreateFactory;
use App\Article\Presenters\ArticleDetailPresenter;
use App\Article\Presenters\ArticlePresenter;
use App\Article\Queries\ArticleQueries;
use App\Article\Resources\ArticleResource;
use App\Article\Resources\ArticleDetailResource;
use App\Article\Requests\ArticleCreateRequest;
use App\Article\Requests\ArticleUpdateRequest;
use App\Article\Services\ArticleService;
use App\Common\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index(ArticleQueries $queries, ArticlePresenter $presenter)
    {
        $articles = $queries->get();
        return Response::json($presenter->collect($articles));
    }

    public function show($id)
    {
        return new ArticleDetailResource(Article::with('comments')->findOrFail($id));
    }

    public function create(ArticleCreateRequest $request, ArticleDetailPresenter $presenter, ArticleService $service)
    {
        $dto = ArticleCreateFactory::fromRequest($request);
        $model = $service->createArticle($dto, Auth::user());
        return Response::json($presenter->present($model));
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
