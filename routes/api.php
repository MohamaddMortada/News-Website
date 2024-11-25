<?php

use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\testController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:api')->get('user', [AuthController::class, 'user']);
Route::middleware('auth:api')->post('logout', [AuthController::class, 'logout']);

Route::get("/test", [testController::class, "test_api"]);
Route::middleware('auth')->group(function () {
    Route::post('/news', [NewsController::class, 'create']);
    Route::put('/news/{id}', [NewsController::class, 'edit']);
    Route::delete('/news/{id}', [NewsController::class, 'remove']);
    Route::post('/restrict', [NewsController::class, 'restrict']);
    Route::post('news/{id}/articles', [ArticleController::class, 'create']);
    Route::get('news/{id}/articles', [ArticleController::class, 'listArticles']);
});
?>