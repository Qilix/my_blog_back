<?php

namespace App\Comment\Controllers;

use App\Comment\DTOs\CommentCreateDTO;
use Illuminate\Routing\Controller;
use App\Common\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function index()
    {
        //
    }

    public function show(Comment $comment)
    {
        //
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

    public function destroy(Comment $comment)
    {
        //
    }
}
