@extends('layouts.app')

@section('title', $article->title)
@section('description', $article->excerpt ?? Str::limit(strip_tags($article->content), 155))
@section('keywords', implode(', ', array_filter([$article->title, 'Nnamdi Nwagwu legal article', 'Chukwunyere Law Chambers', 'lawyer Owerri', 'Nigeria law publication'])))
@section('og_type', 'article')
@if($article->image_path)
  @section('og_image', Str::startsWith($article->image_path, 'http') ? $article->image_path : asset($article->image_path))
@endif

@push('head')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "BlogPosting",
  "headline": "{{ addslashes($article->title) }}",
  "description": "{{ addslashes($article->excerpt ?? Str::limit(strip_tags($article->content), 150)) }}",
  "image": "{{ $article->image_path ? (Str::startsWith($article->image_path, 'http') ? $article->image_path : asset($article->image_path)) : asset('images/law_img.jpg') }}",
  "datePublished": "{{ $article->published_at ? $article->published_at->toIso8601String() : $article->created_at->toIso8601String() }}",
  "dateModified": "{{ $article->updated_at->toIso8601String() }}",
  "author": {
    "@@type": "Person",
    "name": "{{ addslashes($article->author->name ?? config('site.owner_name')) }}",
    "jobTitle": "Barrister & Solicitor",
    "affiliation": {
      "@@type": "LegalService",
      "name": "Chukwunyere Law Chambers",
      "url": "https://chukwunyere-chambers.org"
    }
  },
  "publisher": {
    "@@type": "Organization",
    "name": "{{ addslashes(config('site.owner_name')) }}",
    "logo": {
      "@@type": "ImageObject",
      "url": "{{ asset('images/law_img.jpg') }}"
    }
  },
  "mainEntityOfPage": {
    "@@type": "WebPage",
    "@@id": "{{ request()->url() }}"
  }
}
</script>
@endpush

@section('content')

<section style="
  position: relative;
  padding: clamp(80px, 10vw, 120px) 0 clamp(40px, 6vw, 60px) 0;
  background-image: url('{{ $article->image_path ?? asset('images/law_img_2.jpg') }}');
  background-size: cover;
  background-position: center center;
  background-attachment: fixed;
  border-bottom: 1px solid var(--hairline);
">
  <div style="position:absolute; inset:0; background: linear-gradient(0deg, var(--ink) 0%, rgba(20,24,28,0.75) 100%);"></div>
  <div class="wrap" style="position:relative; z-index:1; max-width: 860px;">
    <p class="eyebrow" style="color:var(--brass-bright);" data-aos="fade-down">
      <a href="{{ route('blog.index') }}" style="color: var(--brass-bright); text-decoration: none;">&larr; Articles & Insights</a>
    </p>
    <h1 data-aos="fade-right" data-aos-delay="100" style="font-size: clamp(2rem, 4vw, 3rem); line-height: 1.2; margin-bottom: 20px;">
      {{ $article->title }}
    </h1>

    <div style="display: flex; align-items: center; gap: 20px; font-size: 0.9rem; opacity: 0.85; flex-wrap: wrap;" data-aos="fade-up" data-aos-delay="150">
      <span><i class="fa fa-user icon-inline"></i> {{ $article->author->name ?? config('site.owner_name') }}</span>
      <span><i class="fa fa-calendar icon-inline"></i> {{ $article->published_at ? $article->published_at->format('F d, Y') : $article->created_at->format('F d, Y') }}</span>
    </div>
  </div>
</section>

<section class="section">
  <div class="wrap" style="max-width: 860px;">
    @if($article->excerpt)
      <div style="font-size: 1.2rem; line-height: 1.6; color: var(--brass-bright); border-left: 3px solid var(--brass); padding-left: 20px; margin-bottom: 40px; font-style: italic;" data-aos="fade-up">
        {{ $article->excerpt }}
      </div>
    @endif

    <div class="article-body" style="font-size: 1.1rem; line-height: 1.8; opacity: 0.9;" data-aos="fade-up">
      {!! $article->content !!}
    </div>

    <!-- Author Callout Box -->
    <div class="card" style="margin-top: 60px; padding: 32px; display: flex; gap: 24px; align-items: center; flex-wrap: wrap;" data-aos="fade-up">
      <div style="width: 64px; height: 64px; border-radius: 50%; background: linear-gradient(135deg, var(--brass), var(--brass-bright)); display: flex; align-items: center; justify-content: center; font-family: 'Fraunces', serif; font-size: 24px; color: var(--ink); flex-shrink: 0;">
        {{ substr($article->author->name ?? 'N', 0, 1) }}
      </div>
      <div style="flex: 1;">
        <h4 style="font-size: 1.1rem; margin-bottom: 4px; color: var(--brass-bright);">Written by {{ $article->author->name ?? config('site.owner_name') }}</h4>
        <p style="font-size: 0.9rem; opacity: 0.8; margin: 0;">
          {{ $article->author->name ?? config('site.owner_name') }} is a Barrister & Solicitor in Nigeria providing legal advisory and representation across commercial, property, civil, and NGO practice areas.
        </p>
      </div>
    </div>

    @if($relatedArticles->isNotEmpty())
      <div style="margin-top: 80px;" data-aos="fade-up">
        <h3 style="font-family: 'Fraunces', serif; font-size: 1.5rem; margin-bottom: 24px; color: var(--brass-bright);">Related Publications</h3>
        <div class="grid grid-3" style="gap: 20px;">
          @foreach($relatedArticles as $rel)
            <div class="card" style="padding: 20px;">
              <div class="docket-index" style="margin-bottom: 8px;">{{ $rel->published_at->format('M d, Y') }}</div>
              <h4 style="font-size: 1rem; margin-bottom: 8px; line-height: 1.3;">
                <a href="{{ route('blog.show', $rel->slug) }}" style="color: var(--parchment);">{{ $rel->title }}</a>
              </h4>
            </div>
          @endforeach
        </div>
      </div>
    @endif
  </div>
</section>

@endsection
