<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller {
    
    function test_api(Request $request) {
        return response()->json([
            "message" => "Hello world"
        ]);
    }
}
?>