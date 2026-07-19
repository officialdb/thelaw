@extends('layouts.app')

@section('title', 'Practice Areas')

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
  <div style="position:absolute; inset:0; background: linear-gradient(0deg, var(--ink) 0%, rgba(20,24,28,0.5) 100%);"></div>
  <div class="wrap" style="position:relative; z-index:1;">
    <p class="eyebrow" data-aos="fade-down" style="color:var(--brass-bright);">Docket of services</p>
    <h1 data-aos="fade-right" data-aos-delay="100" style="margin-bottom:16px;">Practice Areas</h1>
    <p class="lede" style="max-width:600px; text-shadow: 0 2px 10px rgba(0,0,0,0.8);">
      A general practice covering the matters most individuals and small
      businesses actually encounter - handled directly, without being
      passed between departments.
    </p>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <div class="grid grid-3">
      @foreach ($practiceAreas as $i => $area)
        <div class="card" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
          <div class="icon-badge">
            <i class="fa fa-{{ $area['icon'] }}" aria-hidden="true"></i>
          </div>
          <div class="docket-index">Matter Type {{ sprintf('%02d', $i + 1) }}</div>
          <h3>{{ $area['title'] }}</h3>
          <p>{{ $area['summary'] }}</p>
        </div>
      @endforeach
    </div>

    <div style="margin-top:40px; text-align:center;" data-aos="zoom-in">
      <p style="margin-bottom:20px;">Not sure which category your matter falls under? Send a short message and we'll advise.</p>
      <a class="btn btn-primary" href="https://wa.me/{{ config('site.whatsapp_number') }}" target="_blank" rel="noopener">
        <i class="fa fa-whatsapp" aria-hidden="true"></i>
        Ask on WhatsApp
      </a>
    </div>
  </div>
</section>

@endsection
