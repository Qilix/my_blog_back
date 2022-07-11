<?php

use App\Article\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;



Route::prefix('posts')->name('posts.')->group(function () {
    Route::get('/', [ArticleController::class, 'index']);
    Route::get('/{id}', [ArticleController::class, 'show']);
    Route::post('/', [ArticleController::class, 'create']);
    Route::put('/{id}', [ArticleController::class, 'update']);
    Route::delete('/{id}', [ArticleController::class, 'destroy']);
});
