<?php
use App\Http\Controllers\testController;

Route::get("/test", [testController::class, "test_api"]);

?>