@extends('layouts.app')

@section('title', 'Articles & Legal Insights')
@section('description', 'Legal analysis, articles, and insights from ' . config('site.owner_name') . ' on Nigerian corporate, civil, property, and NGO law.')

@section('content')

<section style="
  position: relative;
  padding: clamp(80px, 10vw, 120px) 0 clamp(40px, 6vw, 60px) 0;
  background-image: url('{{ asset('images/law_img_3.jpg') }}');
  background-size: cover;
  background-position: center center;
  background-attachment: fixed;
  border-bottom: 1px solid var(--hairline);
">
  <div style="position:absolute; inset:0; background: linear-gradient(0deg, var(--ink) 0%, rgba(20,24,28,0.65) 100%);"></div>
  <div class="wrap" style="position:relative; z-index:1;">
    <p class="eyebrow" style="color:var(--brass-bright);" data-aos="fade-down">Legal Publications</p>
    <h1 data-aos="fade-right" data-aos-delay="100">Articles & Insights</h1>
    <p class="lede" style="max-width:600px; text-shadow: 0 2px 10px rgba(0,0,0,0.8);" data-aos="fade-up" data-aos-delay="150">
      Analysis, guidance, and legal commentary on commercial governance, NGO compliance, dispute resolution, and Nigerian jurisprudence.
    </p>
  </div>
</section>

<section class="section">
  <div class="wrap">
    @if($articles->isEmpty())
      <div style="text-align: center; padding: 60px 0;" data-aos="fade-up">
        <i class="fa fa-book" style="font-size: 48px; color: var(--brass-bright); opacity: 0.5; margin-bottom: 16px;"></i>
        <h3>Articles Coming Soon</h3>
        <p style="opacity: 0.7; max-width: 480px; margin: 12px auto 24px;">Our legal team is currently preparing comprehensive publications. Check back shortly for updates.</p>
        <a href="{{ route('home') }}" class="btn btn-primary">Return to Home</a>
      </div>
    @else
      <div class="grid grid-3" style="gap: 32px;">
        @foreach($articles as $i => $article)
          <div class="card" data-aos="fade-up" data-aos-delay="{{ ($i % 3) * 100 }}" style="display: flex; flex-direction: column; height: 100%; padding: 0; overflow: hidden;">
            @if($article->image_path)
              <div style="height: 200px; width: 100%; overflow: hidden; position: relative;">
                <img src="{{ $article->image_path }}" alt="{{ $article->title }}" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
              </div>
            @endif

            <div style="padding: 28px; flex: 1; display: flex; flex-direction: column; justify-content: space-between;">
              <div>
                <div class="docket-index" style="margin-bottom: 12px;">
                  <i class="fa fa-calendar icon-inline"></i>{{ $article->published_at ? $article->published_at->format('M d, Y') : $article->created_at->format('M d, Y') }}
                </div>
                <h3 style="margin-bottom: 12px; font-size: 1.25rem; line-height: 1.4;">
                  <a href="{{ route('blog.show', $article->slug) }}" style="color: var(--parchment); transition: color 0.2s;" onmouseover="this.style.color='var(--brass-bright)'" onmouseout="this.style.color='var(--parchment)'">
                    {{ $article->title }}
                  </a>
                </h3>
                @if($article->excerpt)
                  <p style="opacity: 0.8; font-size: 0.95rem; line-height: 1.6; margin-bottom: 20px;">
                    {{ Str::limit($article->excerpt, 120) }}
                  </p>
                @endif
              </div>

              <div style="border-top: 1px solid var(--hairline); padding-top: 16px; margin-top: 20px; display: flex; align-items: center; justify-content: space-between;">
                <span style="font-size: 0.85rem; opacity: 0.7;">By {{ $article->author->name ?? config('site.owner_name') }}</span>
                <a href="{{ route('blog.show', $article->slug) }}" style="color: var(--brass-bright); font-size: 0.85rem; font-family: 'IBM Plex Mono', monospace; font-weight: 500;">Read &rarr;</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      <div style="margin-top: 48px;">
        {{ $articles->links() }}
      </div>
    @endif
  </div>
</section>

@endsection
