@extends('layouts.app')

@section('title', 'About')

@section('content')

<section style="
  position: relative;
  padding: clamp(80px, 10vw, 120px) 0 clamp(40px, 6vw, 60px) 0;
  background-image: url('{{ asset('images/law_img_2.jpg') }}');
  background-size: cover;
  background-position: center 20%;
  background-attachment: fixed;
  border-bottom: 1px solid var(--hairline);
">
  <div style="position:absolute; inset:0; background: linear-gradient(0deg, var(--ink) 0%, rgba(20,24,28,0.7) 100%);"></div>
  <div class="wrap" style="position:relative; z-index:1;">
    <div class="grid grid-2" style="align-items:start; gap:48px;">
      <div data-aos="fade-right">
        <p class="eyebrow" style="color:var(--brass-bright);">About</p>
        <h1 style="margin-bottom:24px;">{{ config('site.owner_name') }}</h1>
        <p class="lede" style="text-shadow: 0 2px 10px rgba(0,0,0,0.8);">
          Nnamdi is an Associate with over 14 years of experience, presently part of the corporate commercial group and a key member of the Criminal Defense, Civil Litigation, and Fundamental Rights sub-group.
        </p>
        <p style="text-shadow: 0 2px 10px rgba(0,0,0,0.8);">
          He has a wealth of experience in general corporate advisory, Labor and Employment, Immigration, as well as general regulatory compliance, including liaison and representation of clients with regulatory authorities. He regularly advises clients on diverse issues ranging from setup of businesses in Nigeria to corporate governance, e-commerce, and general employment matters.
        </p>
      </div>

      <div class="card" data-aos="fade-left" data-aos-delay="200">
        <div class="icon-badge">
          <i class="fa fa-user-circle-o" aria-hidden="true"></i>
        </div>
        <h3 style="margin-bottom:18px;">Credentials</h3>
        <div class="docket-index" style="margin-bottom:4px;">
          <i class="fa fa-gavel icon-inline" aria-hidden="true"></i>Called to the Nigerian Bar
        </div>
        <p style="margin-bottom:16px;">BL – Nigerian Law School, Enugu Campus</p>

        <div class="docket-index" style="margin-bottom:4px;">
          <i class="fa fa-graduation-cap icon-inline" aria-hidden="true"></i>Legal Education
        </div>
        <p style="margin-bottom:16px;">
          LL.B – Imo State University, Owerri<br>
          B.Sc – Public Administration, Imo State University
        </p>

        <div class="docket-index" style="margin-bottom:4px;">
          <i class="fa fa-language icon-inline" aria-hidden="true"></i>Languages & Experience
        </div>
        <p style="margin-bottom:0;">
          English, Igbo<br>
          14 Years of Experience
        </p>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="wrap" style="text-align:center;" data-aos="zoom-in">
    <p class="eyebrow">Reach the chambers</p>
    <h2>Discuss your matter directly</h2>
    <div style="display:flex; gap:16px; justify-content:center; flex-wrap:wrap; margin-top:16px;">
      <a class="btn btn-primary" href="https://wa.me/{{ config('site.whatsapp_number') }}?text=Hello%2C%20I%20would%20like%20to%20enquire%20about%20your%20legal%20services." target="_blank" rel="noopener">
        <i class="fa fa-whatsapp" aria-hidden="true"></i>
        Chat on WhatsApp
      </a>
      <a class="btn btn-ghost" href="{{ route('contact') }}">
        <i class="fa fa-envelope-o" aria-hidden="true"></i>
        Contact page
      </a>
    </div>
  </div>
</section>

@endsection
