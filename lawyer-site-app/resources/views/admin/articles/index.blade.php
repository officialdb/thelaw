@extends('admin.layout')

@section('title', 'Manage Articles')

@section('content')
<div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px;">
  <div>
    <h1 style="font-family: 'Fraunces', serif; font-size: 28px;">Articles & Insights</h1>
    <p style="font-size: 14px; opacity: 0.7; margin-top: 4px;">Manage published legal articles and drafts</p>
  </div>
  <a href="{{ route('admin.articles.create') }}" class="btn-cms">
    <i class="fa fa-plus"></i> New Article
  </a>
</div>

<div class="card-panel">
  @if($articles->isEmpty())
    <div style="text-align: center; padding: 40px 0;">
      <i class="fa fa-pencil-square-o" style="font-size: 40px; color: var(--brass); margin-bottom: 12px; opacity: 0.6;"></i>
      <p style="font-size: 15px; opacity: 0.7;">No articles found.</p>
      <a href="{{ route('admin.articles.create') }}" class="btn-cms" style="margin-top: 16px;">Write Article</a>
    </div>
  @else
    <div class="table-responsive">
      <table class="table-cms">
        <thead>
          <tr>
            <th>Article Title</th>
            <th>Author</th>
            <th>Status</th>
            <th>Date</th>
            <th style="text-align: right;">Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach($articles as $article)
            <tr>
              <td>
                <strong style="color: var(--parchment);">{{ $article->title }}</strong>
                <div style="font-size: 12px; opacity: 0.5; font-family: 'IBM Plex Mono', monospace; margin-top: 2px;">/articles/{{ $article->slug }}</div>
              </td>
              <td>{{ $article->author->name ?? 'System' }}</td>
              <td>
                @if($article->status === 'published')
                  <span style="color: #5dd579; font-size: 12px; font-family: 'IBM Plex Mono', monospace;">● Published</span>
                @else
                  <span style="color: var(--brass); font-size: 12px; font-family: 'IBM Plex Mono', monospace;">○ Draft</span>
                @endif
              </td>
              <td style="font-size: 13px; opacity: 0.7;">{{ $article->created_at->format('M d, Y') }}</td>
              <td style="text-align: right;">
                <div style="display: inline-flex; gap: 8px;">
                  @if($article->status === 'published')
                    <a href="{{ route('blog.show', $article->slug) }}" target="_blank" class="btn-cms btn-cms-secondary" style="padding: 4px 10px; font-size: 11px;">View</a>
                  @endif
                  <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn-cms btn-cms-secondary" style="padding: 4px 10px; font-size: 11px;">Edit</a>
                  <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this article?');" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-cms btn-cms-danger" style="padding: 4px 10px; font-size: 11px;">Delete</button>
                  </form>
                </div>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div style="margin-top: 20px;">
      {{ $articles->links() }}
    </div>
  @endif
</div>
@endsection
