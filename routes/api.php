<?php
use App\Http\Controllers\testController;
use App\Http\Controllers\Admin\NewsController;

Route::get("/test", [testController::class, "test_api"]);
Route::post('news', [NewsController::class, 'create']);

?>