@extends('admin.layout')

@section('title', 'CMS Dashboard')

@section('content')
<div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px;">
  <div>
    <h1 style="font-family: 'Fraunces', serif; font-size: 28px;">Welcome back, {{ auth()->user()->name }}</h1>
    <p style="font-size: 14px; opacity: 0.7; margin-top: 4px;">Content Management & Article Overview</p>
  </div>
  <div>
    <a href="{{ route('admin.articles.create') }}" class="btn-cms">
      <i class="fa fa-plus"></i> Write New Article
    </a>
  </div>
</div>

<!-- Stat Cards -->
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px; margin-bottom: 32px;">
  <div class="card-panel" style="margin-bottom: 0;">
    <div style="font-family: 'IBM Plex Mono', monospace; font-size: 11px; text-transform: uppercase; color: var(--parchment-dim);">Total Articles</div>
    <div style="font-family: 'Fraunces', serif; font-size: 36px; color: var(--brass-bright); margin-top: 8px;">{{ $articlesCount }}</div>
  </div>
  
  <div class="card-panel" style="margin-bottom: 0;">
    <div style="font-family: 'IBM Plex Mono', monospace; font-size: 11px; text-transform: uppercase; color: var(--parchment-dim);">Published</div>
    <div style="font-family: 'Fraunces', serif; font-size: 36px; color: #5dd579; margin-top: 8px;">{{ $publishedCount }}</div>
  </div>

  <div class="card-panel" style="margin-bottom: 0;">
    <div style="font-family: 'IBM Plex Mono', monospace; font-size: 11px; text-transform: uppercase; color: var(--parchment-dim);">Drafts</div>
    <div style="font-family: 'Fraunces', serif; font-size: 36px; color: var(--brass); margin-top: 8px;">{{ $draftsCount }}</div>
  </div>

  <div class="card-panel" style="margin-bottom: 0;">
    <div style="font-family: 'IBM Plex Mono', monospace; font-size: 11px; text-transform: uppercase; color: var(--parchment-dim);">Authors & Users</div>
    <div style="font-family: 'Fraunces', serif; font-size: 36px; color: var(--parchment); margin-top: 8px;">{{ $usersCount }}</div>
  </div>
</div>

<!-- Recent Articles List -->
<div class="card-panel">
  <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
    <h3 style="font-family: 'Fraunces', serif; font-size: 20px;">Recent Articles</h3>
    <a href="{{ route('admin.articles.index') }}" style="font-size: 13px; color: var(--brass-bright);">View All &rarr;</a>
  </div>

  @if($recentArticles->isEmpty())
    <p style="opacity: 0.6; font-size: 14px; padding: 16px 0;">No articles written yet. Click "Write New Article" to publish your first post!</p>
  @else
    <div class="table-responsive">
      <table class="table-cms">
        <thead>
          <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Status</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($recentArticles as $article)
            <tr>
              <td>
                <strong>{{ $article->title }}</strong>
              </td>
              <td>{{ $article->author->name ?? 'Unknown' }}</td>
              <td>
                @if($article->status === 'published')
                  <span style="color: #5dd579; font-size: 12px; font-family: 'IBM Plex Mono', monospace;">● Published</span>
                @else
                  <span style="color: var(--brass); font-size: 12px; font-family: 'IBM Plex Mono', monospace;">○ Draft</span>
                @endif
              </td>
              <td style="font-size: 13px; opacity: 0.7;">{{ $article->created_at->format('M d, Y') }}</td>
              <td>
                <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn-cms btn-cms-secondary" style="padding: 4px 10px; font-size: 11px;">Edit</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @endif
</div>
@endsection
