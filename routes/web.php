<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testController;
use App\Http\Controllers\<ArticleController;
use App\Http\Controllers\Admin\NewsController;

Route::get("/test", [testController::class, "test_api"]);
Route::prefix("/news")->group(function() {
    Route::post('/', [NewsController::class, 'create']);
    Route::put('/{id}', [NewsController::class, 'edit']);
    Route::delete('/{id}', [NewsController::class, 'remove']);
    Route::post('/{id}/restrict', [NewsController::class, 'restrict']);
    Route::post('{id}/articles', [ArticleController::class, 'create']);
    Route::get('{id}/articles', [ArticleController::class, 'listArticles']);
});
Route::get('/', function () {
    return view('welcome');
});
