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
          <a class="btn btn-primary" href="https://wa.me/{{ config('site.whatsapp_number') }}" target="_blank" rel="noopener" style="white-space: nowrap;">
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

<section class="section">
  <div class="wrap">
    <div style="text-align:center; margin-bottom:48px;" data-aos="fade-up">
      <p class="eyebrow">Testimonials</p>
      <h2>What our clients say</h2>
    </div>

    <div class="grid grid-2">
      <div class="card" data-aos="fade-up">
        <div style="color:var(--brass-bright); margin-bottom:16px; font-size:18px;">
          <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
        </div>
        <p style="font-style:italic; margin-bottom:24px; font-size:16px; line-height:1.6; color:var(--parchment);">&ldquo;Nnamdi provided exceptional legal counsel during a very complex property dispute. His strategic approach and clear communication gave us confidence every step of the way.&rdquo;</p>
        <div>
          <strong style="color:var(--brass-bright);">Chinedu O.</strong>
          <div class="eyebrow" style="margin-top:6px; font-size:10px;">Business Owner</div>
        </div>
      </div>
      
      <div class="card" data-aos="fade-up" data-aos-delay="100">
        <div style="color:var(--brass-bright); margin-bottom:16px; font-size:18px;">
          <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
        </div>
        <p style="font-style:italic; margin-bottom:24px; font-size:16px; line-height:1.6; color:var(--parchment);">&ldquo;The level of professionalism and dedication is unmatched. They handled my corporate restructuring seamlessly, allowing me to focus on running my business.&rdquo;</p>
        <div>
          <strong style="color:var(--brass-bright);">Aisha T.</strong>
          <div class="eyebrow" style="margin-top:6px; font-size:10px;">CEO, TechLogistics</div>
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
