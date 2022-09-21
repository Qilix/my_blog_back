<?php

namespace App\Article\Controllers;


use App\Article\Factories\ArticleCreateFactory;
use App\Article\Factories\ArticleUpdateFactory;
use App\Article\Presenters\ArticleDetailPresenter;
use App\Article\Presenters\ArticlePresenter;
use App\Article\Queries\ArticleQueries;
use App\Article\Requests\ArticleCreateRequest;
use App\Article\Requests\ArticleUpdateRequest;
use App\Article\Services\ArticleServices;
use App\Common\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;



class ArticleController extends Controller
{
    public function index(ArticleQueries $queries, ArticlePresenter $presenter)
    {
        $articles = $queries->get();
        return Response::json(['data'=>$presenter->collect($articles),'total' => $articles->total()]);
    }

    public function show($id, ArticleQueries $queries, ArticleDetailPresenter $presenter)
    {
        $article = $queries->getDetail($id);
        return Response::json($presenter->present($article));
    }

    public function create(ArticleCreateRequest $request, ArticleDetailPresenter $presenter, ArticleServices $service)
    {
        $dto = ArticleCreateFactory::fromRequest($request);
        $model = $service->createArticle($dto, Auth::user());
        return Response::json($presenter->present($model));
    }

    public function update($id, ArticleUpdateRequest $request, ArticleDetailPresenter $presenter, ArticleServices $service, ArticleQueries $queries)
    {
        $dto = ArticleUpdateFactory::fromRequest($request);
        $model = $service->updateArticle($id, $queries, $dto, Auth::user());
        return Response::json($presenter->present($model));
    }

    public function destroy($id, ArticleServices $service, ArticleQueries $queries)
    {
        $service->deleteArticle($id, $queries, Auth::user());
        return Response::json(['message' => 'Successfully deleted']);
    }

    public function indexByAuthor(ArticleQueries $queries, ArticlePresenter $presenter){
        $articles = $queries->getArticlesByAuthor(Auth::user());
        return Response::json(['data'=>$presenter->collect($articles),'total' => $articles->total()]);
    }
}
