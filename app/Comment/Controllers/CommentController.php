<?php

namespace App\Comment\Controllers;


use App\Comment\Factories\CommentCreateFactory;
use App\Comment\Factories\CommentUpdateFactory;
use App\Comment\Presenters\CommentPresenter;
use App\Comment\Queries\CommentQueries;
use App\Comment\Requests\CommentCreateRequest;
use App\Comment\Services\CommentServices;
use App\Common\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{

    public function create($article_id,CommentCreateRequest $request, CommentPresenter $presenter, CommentServices $service)
    {
        $dto = CommentCreateFactory::fromRequest($request);
        $model = $service->createComment($dto, Auth::user(), $article_id);
        return Response::json($presenter->present($model));
    }

    public function update($article_id, $comment_id, CommentCreateRequest $request, CommentPresenter $presenter, CommentServices $service, CommentQueries $queries)
    {
        $dto = CommentUpdateFactory::fromRequest($request);
        $model = $service->updateComment($comment_id, $queries, $dto, Auth::user());
        return Response::json($presenter->present($model));
    }

    public function destroy($article_id, $comment_id,CommentServices $service, CommentQueries $queries)
    {
        $service->deleteComment($comment_id, $queries, Auth::user());
        return Response::json(['message' => 'Successfully deleted']);
    }
}
