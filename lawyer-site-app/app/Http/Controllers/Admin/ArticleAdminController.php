<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleAdminController extends Controller
{
    public function dashboard()
    {
        $articlesCount = Article::count();
        $publishedCount = Article::where('status', 'published')->count();
        $draftsCount = Article::where('status', 'draft')->count();
        $usersCount = User::count();
        $recentArticles = Article::with('author')->latest()->take(5)->get();

        return view('admin.dashboard', compact('articlesCount', 'publishedCount', 'draftsCount', 'usersCount', 'recentArticles'));
    }

    public function index()
    {
        $user = auth()->user();
        $query = Article::with('author')->latest();

        if (!$user->isAdmin()) {
            $query->where('user_id', $user->id);
        }

        $articles = $query->paginate(15);
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'status' => 'required|in:draft,published',
            'image' => 'nullable|image|max:3072',
            'image_url' => 'nullable|url|max:500',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('articles', 'public');
            $imagePath = '/storage/' . $path;
        } elseif ($request->filled('image_url')) {
            $imagePath = $request->input('image_url');
        }

        $slug = Article::generateUniqueSlug($validated['title']);

        Article::create([
            'user_id' => auth()->id(),
            'title' => $validated['title'],
            'slug' => $slug,
            'excerpt' => $validated['excerpt'],
            'content' => $validated['content'],
            'image_path' => $imagePath,
            'status' => $validated['status'],
            'published_at' => $validated['status'] === 'published' ? now() : null,
        ]);

        return redirect()->route('admin.articles.index')->with('status', 'Article created successfully!');
    }

    public function edit(Article $article)
    {
        $user = auth()->user();
        if (!$user->isAdmin() && $article->user_id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $user = auth()->user();
        if (!$user->isAdmin() && $article->user_id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'status' => 'required|in:draft,published',
            'image' => 'nullable|image|max:3072',
            'image_url' => 'nullable|url|max:500',
        ]);

        $imagePath = $article->image_path;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('articles', 'public');
            $imagePath = '/storage/' . $path;
        } elseif ($request->filled('image_url')) {
            $imagePath = $request->input('image_url');
        }

        $slug = $article->slug;
        if ($article->title !== $validated['title']) {
            $slug = Article::generateUniqueSlug($validated['title'], $article->id);
        }

        $publishedAt = $article->published_at;
        if ($validated['status'] === 'published' && !$publishedAt) {
            $publishedAt = now();
        }

        $article->update([
            'title' => $validated['title'],
            'slug' => $slug,
            'excerpt' => $validated['excerpt'],
            'content' => $validated['content'],
            'image_path' => $imagePath,
            'status' => $validated['status'],
            'published_at' => $publishedAt,
        ]);

        return redirect()->route('admin.articles.index')->with('status', 'Article updated successfully!');
    }

    public function destroy(Article $article)
    {
        $user = auth()->user();
        if (!$user->isAdmin() && $article->user_id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        $article->delete();
        return redirect()->route('admin.articles.index')->with('status', 'Article deleted successfully!');
    }
}
