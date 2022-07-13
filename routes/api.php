<?php

use App\Article\Controllers\ArticleController;
use App\Comment\Controllers\CommentController;
use App\Common\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::prefix('posts')->name('posts.')->group(function () {
    Route::get('/', [ArticleController::class, 'index']);
    Route::get('/{id}', [ArticleController::class, 'show']);

    Route::post('/', [ArticleController::class, 'create']);
    Route::put('/{id}', [ArticleController::class, 'update']);
    Route::delete('/{id}', [ArticleController::class, 'destroy']);
});


Route::prefix('posts/{id}')->name('comments.')->group(function () {
    Route::post('/', [CommentController::class, 'create']);
    Route::put('/{id}', [CommentController::class, 'update']);
    Route::delete('/{id}', [CommentController::class, 'destroy']);
});


Route::middleware('auth_api')->prefix('users')->name('users.')->group(function () {
    Route::get('/{id}', function (Request $request, $id) {
        $user = User::find($id);
        if (!$user) return response('', 404);
        return $user;
    });
});
