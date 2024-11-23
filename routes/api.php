<?php
use App\Http\Controllers\testController;
use App\Http\Controllers\Admin\NewsController;

Route::get("/test", [testController::class, "test_api"]);
Route::prefix("/news")->group(function() {
    Route::post('/', [NewsController::class, 'create']);
    Route::put('/{id}', [NewsController::class, 'edit']);
    Route::delete('/{id}', [NewsController::class, 'remove']);
})
?>