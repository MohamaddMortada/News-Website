<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller {

    public function create(Request $request, News $news) {

        $article = Article::create([
            'content' => $request->content,
            'news_id' => $news->id,
            'user_id' => auth()->id(),
        ]);

        return response()->json($article);
    }

    public function listArticles(News $news) {
        $articles = $news->articles;
        return response()->json($articles);
    }
    
}
