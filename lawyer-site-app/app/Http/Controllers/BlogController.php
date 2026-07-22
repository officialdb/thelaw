<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $articles = Article::published()->with('author')->latest('published_at')->paginate(9);
        return view('pages.blog.index', compact('articles'));
    }

    public function show(string $slug)
    {
        $article = Article::published()->with('author')->where('slug', $slug)->firstOrFail();
        $relatedArticles = Article::published()
            ->where('id', '!=', $article->id)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('pages.blog.show', compact('article', 'relatedArticles'));
    }
}
