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
            'age_restriction'=>$request->age_restriction,
        ]);

        return response()->json($news);
    }
    public function edit(Request $request, $id) {
        $news=News::find($id)->update([
            'title' => $request->title,
            'content' => $request->content,
            'age_restriction'=>$request->age_restriction,
        ]);
        return response()->json(["updated_news" => $news]);
    }
    public function remove($id) {
        $news = News::find($id)->delete();

        return response()->json([
            "removed_news" => $news
        ]);
    }
    function restrict($id, Request $request) {
        $user = auth()->user();
        $user_age = $user->age;

        $news = News::find($id);

        if (!$news) {
            return response()->json([
                'error' => 'News not found.',
            ], 404);
        }

        if ($news->age_restriction && $user_age < $news->age_restriction) {
            return response()->json([
                'error' => 'You are not old enough to access this news.',
            ], 403);
        }

        return response()->json([
            'news' => $news
        ]);
    }
    
}
?>