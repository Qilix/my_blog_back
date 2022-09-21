<?php

use App\Article\Controllers\ArticleController;
use App\Comment\Controllers\CommentController;
use App\User\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('posts')->name('posts.')->group(function(){
    Route::get('/', [ArticleController::class, 'index']);
    Route::get('/{id}', [ArticleController::class, 'show']);

    Route::middleware('auth:sanctum')->group(function() {
        Route::post('/', [ArticleController::class, 'create']);
        Route::put('/{id}', [ArticleController::class, 'update']);
        Route::delete('/{id}', [ArticleController::class, 'destroy']);
    });
});

Route::prefix('posts/{article_id}/comments')->name('comments.')->middleware('auth:sanctum')->group(function () {
        Route::post('/', [CommentController::class, 'create']);
        Route::put('/{comment_id}', [CommentController::class, 'update']);
        Route::delete('/{comment_id}', [CommentController::class, 'destroy']);
 });

Route::prefix('users')->name('users.')->group(function () {

    Route::post('register', [UserController::class, 'register']);
    Route::post('login', [UserController::class, 'login']);
    Route::middleware('auth:sanctum')->group(function() {
        Route::get('articles', [ArticleController::class, 'indexByAuthor']);
        Route::post('logout', [UserController::class, 'logout']);
        Route::get('', [UserController::class, 'get']);
        });
});
