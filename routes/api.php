<?php

use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\testController;
use App\Http\Controllers\ArticleController;


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