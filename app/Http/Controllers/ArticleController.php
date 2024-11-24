<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller {

    public function create(Request $request, News $news) {

       if (!$news) {
            return response()->json(['error' => 'news not found.'], 404);
        }
        $article = Article::create([
            'content' => $request->content,
            'news_id' => $news->id,
            'user_id' => auth()->id(),
        ]);

        return response()->json($article);
    }

    public function listArticles(News $news) {
        if (!$news) {
            return response()->json(['error' => 'news not found.'], 404);
        }
        $articles = $news->articles;
        return response()->json($articles);
    }
    
}
?>
