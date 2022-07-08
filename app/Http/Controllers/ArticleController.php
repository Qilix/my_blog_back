<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Http\Resources\ArticleDetailResource;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\ArticleStoreRequest;
use App\Models\Article;
use Illuminate\Http\Request;

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

    public function store(ArticleStoreRequest $request)
    {
        $created_article = Article::create($request->validated());

        return new ArticleDetailResource($created_article);
    }
}
