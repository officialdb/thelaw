@extends('layouts.app')

@section('title', 'Contact')

@section('content')

@push('head')
<style>
  .map-dot {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 16px;
    height: 16px;
    background-color: var(--brass-bright);
    border-radius: 50%;
    box-shadow: 0 0 0 0 rgba(212, 175, 95, 0.7);
    animation: map-pulse 2s infinite;
    pointer-events: none;
    z-index: 10;
  }

  @@keyframes map-pulse {
    0% {
      transform: translate(-50%, -50%) scale(0.95);
      box-shadow: 0 0 0 0 rgba(212, 175, 95, 0.7);
    }
    70% {
      transform: translate(-50%, -50%) scale(1);
      box-shadow: 0 0 0 24px rgba(212, 175, 95, 0);
    }
    100% {
      transform: translate(-50%, -50%) scale(0.95);
      box-shadow: 0 0 0 0 rgba(212, 175, 95, 0);
    }
  }
</style>
@endpush

<section style="
  position: relative;
  padding: clamp(80px, 10vw, 120px) 0 clamp(40px, 6vw, 60px) 0;
  background-image: url('{{ asset('images/law_img_2.jpg') }}');
  background-size: cover;
  background-position: center 30%;
  background-attachment: fixed;
  border-bottom: 1px solid var(--hairline);
">
  <div style="position:absolute; inset:0; background: linear-gradient(0deg, var(--ink) 0%, rgba(20,24,28,0.6) 100%);"></div>
  <div class="wrap" style="position:relative; z-index:1;">
    <p class="eyebrow" style="color:var(--brass-bright);" data-aos="fade-down">Contact</p>
    <h1 data-aos="fade-right" data-aos-delay="100">Get in touch</h1>
  </div>
</section>

<section class="section" style="padding-top: clamp(48px, 8vw, 80px);">
  <div class="wrap">

    <div class="grid grid-2" style="margin-top:32px; align-items:start; gap:48px;">
      <div data-aos="fade-right">
        <p class="lede" style="margin-bottom:28px;">
          WhatsApp is the fastest way to reach the chambers. For formal
          correspondence, use the form or email address below.
        </p>

        <a class="btn btn-primary" href="https://wa.me/{{ config('site.whatsapp_number') }}?text=Hello%2C%20I%20would%20like%20to%20enquire%20about%20your%20legal%20services." target="_blank" rel="noopener" style="margin-bottom:32px; display:inline-flex;">
          <i class="fa fa-whatsapp" aria-hidden="true"></i>
          Message on WhatsApp
        </a>

        <div class="footer-addr" style="font-size:14px;">
          <strong>{{ config('site.owner_name') }}</strong><br>
          <i class="fa fa-map-marker icon-inline" aria-hidden="true"></i>{{ config('site.address') }}<br>
          <i class="fa fa-phone icon-inline" aria-hidden="true"></i><a href="tel:{{ preg_replace('/[^0-9+]/', '', config('site.phone_display')) }}">{{ config('site.phone_display') }}</a><br>
          <i class="fa fa-envelope icon-inline" aria-hidden="true"></i><a href="mailto:{{ config('site.email') }}">{{ config('site.email') }}</a>
        </div>
      </div>

      <div class="card" data-aos="fade-left" data-aos-delay="200">
        @if (session('status'))
          <p style="color: var(--brass-bright); margin-bottom:20px;">{{ session('status') }}</p>
        @endif

        <form method="POST" action="{{ route('contact.submit') }}" style="display:flex; flex-direction:column; gap:16px;">
          @csrf

          <div>
            <label for="name" style="display:block; font-family:'IBM Plex Mono',monospace; font-size:11px; letter-spacing:.08em; text-transform:uppercase; color:var(--parchment-dim); margin-bottom:6px;">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required
              style="width:100%; background:transparent; border:1px solid var(--hairline); color:var(--parchment); padding:11px 12px; font-family:'IBM Plex Sans',sans-serif; font-size:14px;">
            @error('name') <small style="color:var(--brass-bright);">{{ $message }}</small> @enderror
          </div>

          <div>
            <label for="email" style="display:block; font-family:'IBM Plex Mono',monospace; font-size:11px; letter-spacing:.08em; text-transform:uppercase; color:var(--parchment-dim); margin-bottom:6px;">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required
              style="width:100%; background:transparent; border:1px solid var(--hairline); color:var(--parchment); padding:11px 12px; font-family:'IBM Plex Sans',sans-serif; font-size:14px;">
            @error('email') <small style="color:var(--brass-bright);">{{ $message }}</small> @enderror
          </div>

          <div>
            <label for="phone" style="display:block; font-family:'IBM Plex Mono',monospace; font-size:11px; letter-spacing:.08em; text-transform:uppercase; color:var(--parchment-dim); margin-bottom:6px;">Phone (optional)</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
              style="width:100%; background:transparent; border:1px solid var(--hairline); color:var(--parchment); padding:11px 12px; font-family:'IBM Plex Sans',sans-serif; font-size:14px;">
          </div>

          <div>
            <label for="message" style="display:block; font-family:'IBM Plex Mono',monospace; font-size:11px; letter-spacing:.08em; text-transform:uppercase; color:var(--parchment-dim); margin-bottom:6px;">Message</label>
            <textarea id="message" name="message" rows="5" required
              style="width:100%; background:transparent; border:1px solid var(--hairline); color:var(--parchment); padding:11px 12px; font-family:'IBM Plex Sans',sans-serif; font-size:14px; resize:vertical;">{{ old('message') }}</textarea>
            @error('message') <small style="color:var(--brass-bright);">{{ $message }}</small> @enderror
          </div>

          <button type="submit" class="btn btn-primary" style="align-self:flex-start; border:1px solid var(--brass); cursor:pointer;">
            <i class="fa fa-paper-plane" aria-hidden="true"></i>
            Send message
          </button>
        </form>
      </div>
    </div>
  </div>
</section>

<section class="section" style="padding-top:0;">
  <div class="wrap" data-aos="fade-up">
    <p class="eyebrow" style="margin-bottom:8px;">Find us</p>
    <h3 style="margin-bottom:20px;">82/84 Wetheral Road, Owerri, Imo State</h3>
    <div style="position:relative; border:1px solid var(--hairline); overflow:hidden; border-radius:2px;">
      <div class="map-dot"></div>
      <iframe
        src="https://maps.google.com/maps?q=82+Wetheral+Road,+Owerri,+Imo+State,+Nigeria&t=&z=16&ie=UTF8&iwloc=&output=embed"
        width="100%"
        height="460"
        style="border:0; display:block; filter: grayscale(30%) contrast(90%) brightness(80%);"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        title="Chukwunyere Chambers location on Google Maps">
      </iframe>
    </div>
    <div style="display:flex; align-items:center; gap:24px; flex-wrap:wrap; margin-top:16px; font-size:13px; opacity:0.7;">
      <span><i class="fa fa-map-marker icon-inline" aria-hidden="true"></i>82/84 Wetheral Road, Owerri 460001, Imo State, Nigeria</span>
      <a href="https://maps.google.com/maps?q=82+Wetheral+Road,+Owerri,+Imo+State,+Nigeria" target="_blank" rel="noopener" style="color:var(--brass-bright); text-decoration:none;">
        <i class="fa fa-external-link icon-inline" aria-hidden="true"></i>Open in Google Maps
      </a>
    </div>
  </div>
</section>


@endsection
