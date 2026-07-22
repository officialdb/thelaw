@extends('admin.layout')

@section('title', 'Write New Article')

@section('content')
<div style="margin-bottom: 24px;">
  <a href="{{ route('admin.articles.index') }}" style="font-size: 13px; opacity: 0.7;">&larr; Back to Articles</a>
  <h1 style="font-family: 'Fraunces', serif; font-size: 28px; margin-top: 8px;">Write New Article</h1>
</div>

<div class="card-panel">
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul style="padding-left: 20px; margin: 0;">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
      <label for="title">Article Title *</label>
      <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" placeholder="e.g. Legal Framework for Foreign Direct Investment in Nigeria" required autofocus>
    </div>

    <div class="form-group">
      <label for="excerpt">Short Excerpt / Summary</label>
      <textarea id="excerpt" name="excerpt" class="form-control" rows="3" placeholder="Brief 1-2 sentence overview of the article for list views and social sharing...">{{ old('excerpt') }}</textarea>
    </div>

    <div class="form-group">
      <label for="editor">Article Content (Rich Text Editor) *</label>
      <div id="editor-container" style="min-height: 280px; background: var(--ink); color: var(--parchment); border: 1px solid var(--hairline); border-radius: 3px;">
        {!! old('content') !!}
      </div>
      <textarea id="content" name="content" style="display: none;" required>{{ old('content') }}</textarea>
      <small style="opacity: 0.6; display: block; margin-top: 6px;">Use the toolbar to format headings, lists, bold text, blockquotes, and links.</small>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
      <div class="form-group">
        <label for="image_url">Cover Image URL (Optional)</label>
        <input type="url" id="image_url" name="image_url" class="form-control" value="{{ old('image_url') }}" placeholder="https://example.com/image.jpg">
      </div>

      <div class="form-group">
        <label for="image">Or Upload Cover Image File</label>
        <input type="file" id="image" name="image" class="form-control" accept="image/*">
      </div>
    </div>

    <div class="form-group" style="margin-top: 10px;">
      <label for="status">Publication Status *</label>
      <select id="status" name="status" class="form-control" style="max-width: 200px;">
        <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Published</option>
        <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft</option>
      </select>
    </div>

    <div style="margin-top: 32px; border-top: 1px solid var(--hairline); padding-top: 20px; display: flex; gap: 12px;">
      <button type="submit" class="btn-cms">
        <i class="fa fa-paper-plane"></i> Save Article
      </button>
      <a href="{{ route('admin.articles.index') }}" class="btn-cms btn-cms-secondary">Cancel</a>
    </div>
  </form>
</div>

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
<style>
  .ql-toolbar.ql-snow {
    background: var(--ink-2);
    border-color: var(--hairline) !important;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
  }
  .ql-container.ql-snow {
    border-color: var(--hairline) !important;
    border-bottom-left-radius: 3px;
    border-bottom-right-radius: 3px;
    font-family: 'IBM Plex Sans', sans-serif;
    font-size: 15px;
  }
  .ql-snow .ql-stroke { stroke: var(--parchment) !important; }
  .ql-snow .ql-fill { fill: var(--parchment) !important; }
  .ql-snow .ql-picker { color: var(--parchment) !important; }
  .ql-snow .ql-picker-options { background-color: var(--ink-card) !important; border-color: var(--hairline) !important; }
  .ql-editor { min-height: 250px; }
  .ql-editor.ql-blank::before { color: var(--parchment-dim) !important; font-style: normal; }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var quill = new Quill('#editor-container', {
      theme: 'snow',
      placeholder: 'Write your legal article content here...',
      modules: {
        toolbar: [
          [{ 'header': [2, 3, 4, false] }],
          ['bold', 'italic', 'underline', 'strike'],
          [{ 'list': 'ordered'}, { 'list': 'bullet' }],
          ['blockquote', 'code-block'],
          ['link', 'clean']
        ]
      }
    });

    var form = document.querySelector('form');
    var contentInput = document.querySelector('#content');

    form.onsubmit = function() {
      contentInput.value = quill.root.innerHTML;
    };
  });
</script>
@endpush

@endsection
