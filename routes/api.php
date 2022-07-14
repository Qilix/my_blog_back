<?php

use App\Article\Controllers\ArticleController;
use App\Comment\Controllers\CommentController;
use App\User\Controllers\UserController;
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


Route::middleware('auth:api')->prefix('posts/{id}')->name('comments.')->group(function () {
    Route::post('/', [CommentController::class, 'create']);
    Route::put('/{id}', [CommentController::class, 'update']);
    Route::delete('/{id}', [CommentController::class, 'destroy']);
});

// Route::post('register', [UserController::class, 'register']);
// Route::middleware('auth_api')->prefix('users')->name('users.')->group(function () {
//     Route::get('/{id}', function (Request $request, $id) {
//         $user = User::find($id);
//         if (!$user) return response('', 404);
//         return $user;
//     });
// });
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('users')->name('users.')->group(function () {
    Route::middleware('auth:api')->get('user', function (Request $request) {
        return $request->user();
    });
    Route::post('register', [UserController::class, 'register']);
    Route::post('login', [UserController::class, 'login']);
    Route::post('logout', [UserController::class, 'logout'])->middleware('auth:api');
});
