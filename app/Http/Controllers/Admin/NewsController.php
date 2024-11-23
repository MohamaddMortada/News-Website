<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller {

    public function create(Request $request) {
        $news = News::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->id(),
        ]);

        return response()->json($news);
    }
    public function edit(Request $request, $id) {
        $news=News::find($id)->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        return response()->json("updated_news" => $news);
    }
}
