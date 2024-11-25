<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller {
    public function __construct() {
        $this->middleware('auth:api'); 
    }

    public function create(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'age_restriction' => 'required|integer',
        ]);
        $news = News::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'user_id' => auth()->id(),
            'age_restriction' => $validated['age_restriction'],
        ]);

        return response()->json($news);
    }
    public function edit(Request $request, $id) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'age_restriction' => 'required|integer',
        ]);
        $news=News::find($id)->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'age_restriction' => $validated['age_restriction'],
        ]);
        return response()->json(["updated_news" => $news]);
    }
    public function remove($id) {
        $news = News::find($id);
    
        if (!$news) {
            return response()->json([
                "News not found",
            ]);
        }
    
        $news->delete();
    
        return response()->json([
            "News item deleted successfully",
            "removed_news" => $news,
        ]);
    }

    public function restrict($id, Request $request) {
        $user = auth()->user();
    
        if (!$user) {
            return response()->json([
                'error' => 'User not authenticated.',
            ], 401);
        }
    
        if (!isset($user->age)) {
            return response()->json([
                'error' => 'Age information is missing for the user.',
            ], 400); 
        }
    
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
            'news' => $news,
        ]);
    }
    
}
?>