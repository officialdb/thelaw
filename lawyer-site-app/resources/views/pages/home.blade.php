@extends('layouts.app')

@section('title', config('site.owner_name'))

@push('head')
<style>
  .home-hero{
    position:relative;
    display:flex;
    align-items:stretch;
    min-height: clamp(520px, 62vw, 760px);
    padding: clamp(24px, 4vw, 44px) 0;
    overflow:hidden;
    background-color: var(--ink);
    background-image: url('{{ asset('images/law_img.jpg') }}');
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    box-shadow: 0 24px 60px rgba(0,0,0,.28);
  }

  .home-hero::after{
    content:'';
    position:absolute;
    inset:0;
    background: linear-gradient(180deg, rgba(20,24,28,.06), rgba(20,24,28,.38) 44%, rgba(20,24,28,.78));
    pointer-events:none;
  }

  .home-hero .hero-copy{
    position:absolute;
    left: clamp(20px, 5vw, 48px);
    top: 50%;
    transform: translateY(-50%);
    max-width: min(620px, calc(100% - 36px));
    z-index:1;
  }

  .home-hero .hero-copy h1,
  .home-hero .hero-copy .lede,
  .home-hero .hero-copy .eyebrow {
    text-shadow: 0 2px 10px rgba(0,0,0,0.8), 0 8px 32px rgba(0,0,0,0.8);
  }

  .home-hero .hero-copy h1{
    max-width: none;
  }

  .home-hero .hero-copy .lede{
    max-width: 52ch;
  }

  .hero-meta{
    display:flex;
    align-items:flex-end;
    justify-content:flex-end;
    width:100%;
    z-index:1;
    position:relative;
    pointer-events:none;
  }

  .hero-badge{
    margin-left:auto;
    max-width: 280px;
    padding: 16px 18px;
    border:1px solid rgba(233,226,207,.16);
    background: rgba(20,24,28,.56);
    backdrop-filter: blur(8px);
  }

  .hero-badge strong{
    display:block;
    font-family:'Fraunces', serif;
    font-size:16px;
    font-weight:500;
    color: var(--parchment);
    margin-bottom:4px;
  }

  .hero-badge span{
    display:block;
    font-family:'IBM Plex Mono', monospace;
    font-size:10.5px;
    letter-spacing:.18em;
    text-transform:uppercase;
    color: var(--parchment-dim);
  }

  .hero-badge i{
    color: var(--brass-bright);
    font-size:20px;
    line-height:1;
  }

  @media (max-width: 900px){
    .home-hero{
      min-height: 640px;
    }
  }

  @media (max-width: 560px){
    .home-hero{
      min-height: 720px;
      padding: 16px;
      align-items:flex-end;
      background-position: 78% center;
    }

    .home-hero .hero-wrap{
      flex-direction: column;
      align-items: stretch;
      justify-content: flex-end;
      gap: 24px;
      padding-top: 120px;
      padding-bottom: 32px;
    }

    .home-hero .hero-copy{
      position: relative;
      left: auto;
      right: auto;
      top: auto;
      bottom: auto;
      transform: none;
      max-width: none;
    }

    .hero-badge{
      max-width:none;
      margin-top:0;
    }
  }
</style>
@endpush

@section('content')

<section class="section" style="padding-top: 0;">
    <div class="home-hero">
      <div class="wrap hero-wrap" style="position:relative; width:100%; height:100%; display:flex; align-items:flex-end;">
      <div class="hero-copy" data-aos="fade-up">
        <p class="eyebrow">{{ config('site.owner_role') }} &middot; Nigeria</p>
        <h1>Sound legal counsel,<br>plainly explained.</h1>
        <p class="lede" style="max-width:560px;">
          {{ config('site.owner_name') }} represents individuals and businesses
          across civil, corporate, and property matters - with direct, honest
          communication from first consultation to resolution.
        </p>

        <div style="display:flex; gap:16px; flex-wrap:wrap; margin-top:32px;">
          <a class="btn btn-primary" href="https://wa.me/{{ config('site.whatsapp_number') }}?text=Hello%2C%20I%20would%20like%20to%20enquire%20about%20your%20legal%20services." target="_blank" rel="noopener" style="white-space: nowrap;">
            <i class="fa fa-whatsapp" aria-hidden="true"></i>
            Free consultation
          </a>
          <a class="btn btn-ghost" href="{{ route('practice-areas') }}">
            <i class="fa fa-balance-scale" aria-hidden="true"></i>
            View practice areas
          </a>
        </div>
      </div>
      <div class="hero-meta" aria-hidden="true" data-aos="fade-left" data-aos-delay="200">
        <div class="hero-badge">
          <strong>Chambers focus</strong>
          <span>Measured advice, direct contact, clear next steps</span>
          <div style="margin-top:12px;">
            <i class="fa fa-balance-scale" aria-hidden="true"></i>
          </div>
        </div>
      </div>
      </div>
    </div>
</section>

<section class="section">
  <div class="wrap">
    <p class="eyebrow" data-aos="fade-up">Areas of practice</p>
    <h2 data-aos="fade-up" data-aos-delay="100">Where the chambers can help</h2>

    <div class="grid grid-2" style="margin-top:32px;">
      @foreach ($practiceAreas as $i => $area)
        <div class="card" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
          <div class="icon-badge">
            <i class="fa fa-{{ $area['icon'] }}" aria-hidden="true"></i>
          </div>
          <div class="docket-index">{{ sprintf('%02d', $i + 1) }}</div>
          <h3>{{ $area['title'] }}</h3>
          <p>{{ $area['summary'] }}</p>
        </div>
      @endforeach
    </div>

    <div style="margin-top:32px;" data-aos="fade-up" data-aos-delay="200">
      <a class="btn btn-ghost" href="{{ route('practice-areas') }}">See all practice areas &rarr;</a>
    </div>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <div style="text-align:center; margin-bottom:48px;" data-aos="fade-up">
      <p class="eyebrow">Why choose us</p>
      <h2>Dedicated to your success</h2>
      <p style="max-width:600px; margin:0 auto;">Legal issues can be daunting, but the right counsel makes all the difference. We focus on straightforward communication, rigorous preparation, and measurable results.</p>
    </div>

    <div class="grid grid-3">
      <div class="card" data-aos="fade-up" data-aos-delay="0">
        <div class="icon-badge">
          <i class="fa fa-comments" aria-hidden="true"></i>
        </div>
        <h3>Direct Communication</h3>
        <p>No middlemen. You speak directly with the attorney handling your case from day one.</p>
      </div>
      <div class="card" data-aos="fade-up" data-aos-delay="100">
        <div class="icon-badge">
          <i class="fa fa-shield" aria-hidden="true"></i>
        </div>
        <h3>Strategic Action</h3>
        <p>We don't just react; we proactively build the strongest possible position for your matter.</p>
      </div>
      <div class="card" data-aos="fade-up" data-aos-delay="200">
        <div class="icon-badge">
          <i class="fa fa-handshake-o" aria-hidden="true"></i>
        </div>
        <h3>Transparent Fees</h3>
        <p>Clear, predictable fee structures established upfront so there are never any surprises.</p>
      </div>
    </div>
  </div>
</section>

<section class="section" style="background: rgba(255,255,255,0.01); border-top:1px solid var(--hairline); border-bottom: 1px solid var(--hairline);">
  <div class="wrap">
    <div class="grid grid-3" style="text-align:center;">
      <div data-aos="fade-up" data-aos-delay="0">
        <div style="font-family:'Fraunces', serif; font-size:56px; color:var(--brass-bright); margin-bottom:8px; line-height:1;">
          <span class="counter" data-target="15">0</span>+
        </div>
        <div class="eyebrow">Years Experience</div>
      </div>
      <div data-aos="fade-up" data-aos-delay="100">
        <div style="font-family:'Fraunces', serif; font-size:56px; color:var(--brass-bright); margin-bottom:8px; line-height:1;">
          <span class="counter" data-target="500">0</span>+
        </div>
        <div class="eyebrow">Cases Handled</div>
      </div>
      <div data-aos="fade-up" data-aos-delay="200">
        <div style="font-family:'Fraunces', serif; font-size:56px; color:var(--brass-bright); margin-bottom:8px; line-height:1;">
          <span class="counter" data-target="98">0</span>%
        </div>
        <div class="eyebrow">Success Rate</div>
      </div>
    </div>
  </div>
</section>

@if(isset($latestArticles) && $latestArticles->isNotEmpty())
<section class="section">
  <div class="wrap">
    <div style="display:flex; justify-content:space-between; align-items:flex-end; margin-bottom:48px; flex-wrap:wrap; gap:20px;" data-aos="fade-up">
      <div>
        <p class="eyebrow">Legal Publications</p>
        <h2>Latest Articles & Insights</h2>
      </div>
      <a href="{{ route('blog.index') }}" class="btn btn-ghost">View All Articles &rarr;</a>
    </div>

    <div class="grid grid-3" style="gap:28px;">
      @foreach($latestArticles as $i => $article)
        <div class="card" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}" style="display:flex; flex-direction:column; padding:0; overflow:hidden;">
          @if($article->image_path)
            <div style="height:180px; width:100%; overflow:hidden;">
              <img src="{{ $article->image_path }}" alt="{{ $article->title }}" style="width:100%; height:100%; object-fit:cover;">
            </div>
          @endif
          <div style="padding:24px; flex:1; display:flex; flex-direction:column; justify-content:space-between;">
            <div>
              <div class="docket-index" style="margin-bottom:8px;">
                <i class="fa fa-calendar icon-inline"></i>{{ $article->published_at ? $article->published_at->format('M d, Y') : $article->created_at->format('M d, Y') }}
              </div>
              <h3 style="font-size:1.15rem; line-height:1.4; margin-bottom:10px;">
                <a href="{{ route('blog.show', $article->slug) }}" style="color:var(--parchment); text-decoration:none;">{{ $article->title }}</a>
              </h3>
              @if($article->excerpt)
                <p style="font-size:0.9rem; opacity:0.8; line-height:1.5;">{{ Str::limit($article->excerpt, 100) }}</p>
              @endif
            </div>
            <div style="border-top:1px solid var(--hairline); padding-top:14px; margin-top:16px; display:flex; justify-content:space-between; align-items:center;">
              <span style="font-size:0.8rem; opacity:0.6;">By {{ $article->author->name ?? config('site.owner_name') }}</span>
              <a href="{{ route('blog.show', $article->slug) }}" style="color:var(--brass-bright); font-size:0.8rem; font-family:'IBM Plex Mono',monospace;">Read &rarr;</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif

<section class="section" style="background: linear-gradient(135deg, rgba(176,141,62,0.06) 0%, rgba(20,24,28,0) 60%); border-top: 1px solid var(--hairline);">
  <div class="wrap">
    <div style="text-align:center; margin-bottom:56px;" data-aos="fade-up">
      <p class="eyebrow">Client testimonials</p>
      <h2>What clients say</h2>
      <p style="max-width:520px; margin:12px auto 0; opacity:0.7;">Trusted by individuals, businesses, and organisations across Nigeria.</p>
    </div>

    <div class="grid grid-2" style="gap: 28px;">

      <div class="card" data-aos="fade-up" data-aos-delay="0" style="position:relative; padding: 40px 36px 32px;">
        <div style="position:absolute; top:20px; left:28px; font-family:'Fraunces',serif; font-size:72px; line-height:1; color:var(--brass); opacity:0.25; pointer-events:none;">&ldquo;</div>
        <div style="color:var(--brass-bright); margin-bottom:16px; font-size:14px; letter-spacing:2px;">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
        <p style="font-style:italic; margin-bottom:28px; font-size:15.5px; line-height:1.75; color:var(--parchment); position:relative; z-index:1;">
          Nnamdi provided exceptional legal counsel during a very complex property dispute. His strategic approach and clear communication gave us confidence every step of the way. Highly recommended.
        </p>
        <div style="display:flex; align-items:center; gap:14px; border-top:1px solid var(--hairline); padding-top:20px;">
          <div style="width:40px; height:40px; border-radius:50%; background:linear-gradient(135deg,var(--brass),var(--brass-bright)); display:flex; align-items:center; justify-content:center; font-family:'Fraunces',serif; font-size:18px; color:var(--ink); flex-shrink:0;">C</div>
          <div>
            <strong style="color:var(--brass-bright); display:block;">Chinedu O.</strong>
            <span style="font-family:'IBM Plex Mono',monospace; font-size:10px; letter-spacing:1px; text-transform:uppercase; opacity:0.6;">Business Owner, Owerri</span>
          </div>
        </div>
      </div>

      <div class="card" data-aos="fade-up" data-aos-delay="100" style="position:relative; padding: 40px 36px 32px;">
        <div style="position:absolute; top:20px; left:28px; font-family:'Fraunces',serif; font-size:72px; line-height:1; color:var(--brass); opacity:0.25; pointer-events:none;">&ldquo;</div>
        <div style="color:var(--brass-bright); margin-bottom:16px; font-size:14px; letter-spacing:2px;">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
        <p style="font-style:italic; margin-bottom:28px; font-size:15.5px; line-height:1.75; color:var(--parchment); position:relative; z-index:1;">
          The level of professionalism and dedication is unmatched. He handled our NGO registration and governance documentation seamlessly, allowing us to focus on our programmes.
        </p>
        <div style="display:flex; align-items:center; gap:14px; border-top:1px solid var(--hairline); padding-top:20px;">
          <div style="width:40px; height:40px; border-radius:50%; background:linear-gradient(135deg,var(--brass),var(--brass-bright)); display:flex; align-items:center; justify-content:center; font-family:'Fraunces',serif; font-size:18px; color:var(--ink); flex-shrink:0;">A</div>
          <div>
            <strong style="color:var(--brass-bright); display:block;">Adaeze M.</strong>
            <span style="font-family:'IBM Plex Mono',monospace; font-size:10px; letter-spacing:1px; text-transform:uppercase; opacity:0.6;">Executive Director, NGO</span>
          </div>
        </div>
      </div>

      <div class="card" data-aos="fade-up" data-aos-delay="200" style="position:relative; padding: 40px 36px 32px;">
        <div style="position:absolute; top:20px; left:28px; font-family:'Fraunces',serif; font-size:72px; line-height:1; color:var(--brass); opacity:0.25; pointer-events:none;">&ldquo;</div>
        <div style="color:var(--brass-bright); margin-bottom:16px; font-size:14px; letter-spacing:2px;">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
        <p style="font-style:italic; margin-bottom:28px; font-size:15.5px; line-height:1.75; color:var(--parchment); position:relative; z-index:1;">
          I engaged Nnamdi for a fundamental rights enforcement matter. He was thorough, responsive, and delivered a favourable outcome. I would not hesitate to instruct him again.
        </p>
        <div style="display:flex; align-items:center; gap:14px; border-top:1px solid var(--hairline); padding-top:20px;">
          <div style="width:40px; height:40px; border-radius:50%; background:linear-gradient(135deg,var(--brass),var(--brass-bright)); display:flex; align-items:center; justify-content:center; font-family:'Fraunces',serif; font-size:18px; color:var(--ink); flex-shrink:0;">E</div>
          <div>
            <strong style="color:var(--brass-bright); display:block;">Emeka R.</strong>
            <span style="font-family:'IBM Plex Mono',monospace; font-size:10px; letter-spacing:1px; text-transform:uppercase; opacity:0.6;">Civil Servant, Lagos</span>
          </div>
        </div>
      </div>

      <div class="card" data-aos="fade-up" data-aos-delay="300" style="position:relative; padding: 40px 36px 32px;">
        <div style="position:absolute; top:20px; left:28px; font-family:'Fraunces',serif; font-size:72px; line-height:1; color:var(--brass); opacity:0.25; pointer-events:none;">&ldquo;</div>
        <div style="color:var(--brass-bright); margin-bottom:16px; font-size:14px; letter-spacing:2px;">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
        <p style="font-style:italic; margin-bottom:28px; font-size:15.5px; line-height:1.75; color:var(--parchment); position:relative; z-index:1;">
          As an international partner organisation, we needed reliable local counsel in Nigeria. Nnamdi provided clear, practical legal advice that enabled our project to proceed without delays.
        </p>
        <div style="display:flex; align-items:center; gap:14px; border-top:1px solid var(--hairline); padding-top:20px;">
          <div style="width:40px; height:40px; border-radius:50%; background:linear-gradient(135deg,var(--brass),var(--brass-bright)); display:flex; align-items:center; justify-content:center; font-family:'Fraunces',serif; font-size:18px; color:var(--ink); flex-shrink:0;">S</div>
          <div>
            <strong style="color:var(--brass-bright); display:block;">Sophie K.</strong>
            <span style="font-family:'IBM Plex Mono',monospace; font-size:10px; letter-spacing:1px; text-transform:uppercase; opacity:0.6;">Programme Manager, International Development</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>


<section class="section">
  <div class="wrap" style="text-align:center;" data-aos="zoom-in">
    <p class="eyebrow">Get in touch</p>
    <h2>The fastest way to reach the chambers is WhatsApp</h2>
    <p style="max-width:520px; margin:0 auto 28px;">
      Send a brief description of your matter and expect a response within
      one business day. For anything urgent, call directly.
    </p>
    <a class="btn btn-primary" href="https://wa.me/{{ config('site.whatsapp_number') }}" target="_blank" rel="noopener">
      <i class="fa fa-whatsapp" aria-hidden="true"></i>
      Message on WhatsApp
    </a>
  </div>
</section>

@endsection
