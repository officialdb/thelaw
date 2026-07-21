@extends('layouts.app')

@section('title', 'FAQ')
@section('description', 'Frequently asked questions about legal services offered by ' . config('site.owner_name') . ', Barrister & Solicitor in Nigeria.')

@push('head')
<style>
  .faq-item {
    border-bottom: 1px solid var(--hairline);
  }

  .faq-item:last-child {
    border-bottom: none;
  }

  .faq-question {
    width: 100%;
    background: none;
    border: none;
    color: var(--parchment);
    font-family: 'Fraunces', serif;
    font-size: clamp(16px, 2vw, 18px);
    font-weight: 400;
    text-align: left;
    padding: 24px 0;
    cursor: pointer;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 16px;
    line-height: 1.4;
    transition: color 0.2s;
  }

  .faq-question:hover {
    color: var(--brass-bright);
  }

  .faq-question[aria-expanded="true"] {
    color: var(--brass-bright);
  }

  .faq-icon {
    flex-shrink: 0;
    width: 28px;
    height: 28px;
    border-radius: 50%;
    border: 1px solid var(--hairline);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    color: var(--brass-bright);
    transition: transform 0.3s, background 0.2s;
  }

  .faq-question[aria-expanded="true"] .faq-icon {
    transform: rotate(45deg);
    background: rgba(176,141,62,0.12);
    border-color: var(--brass);
  }

  .faq-answer {
    display: grid;
    grid-template-rows: 0fr;
    transition: grid-template-rows 0.35s ease;
  }

  .faq-answer.open {
    grid-template-rows: 1fr;
  }

  .faq-answer-inner {
    overflow: hidden;
  }

  .faq-answer-inner p {
    padding-bottom: 24px;
    line-height: 1.75;
    opacity: 0.85;
    max-width: 720px;
  }

  .faq-answer-inner ul {
    padding-bottom: 24px;
    padding-left: 20px;
    opacity: 0.85;
    line-height: 1.9;
    max-width: 720px;
  }

  @media (max-width: 700px) {
    .faq-layout {
      grid-template-columns: 1fr !important;
    }
    aside {
      position: static !important;
    }
  }
</style>
@endpush

@section('content')

<section style="
  position: relative;
  padding: clamp(80px, 10vw, 120px) 0 clamp(40px, 6vw, 60px) 0;
  background-image: url('{{ asset('images/law_img_2.jpg') }}');
  background-size: cover;
  background-position: center 40%;
  background-attachment: fixed;
  border-bottom: 1px solid var(--hairline);
">
  <div style="position:absolute; inset:0; background: linear-gradient(0deg, var(--ink) 0%, rgba(20,24,28,0.6) 100%);"></div>
  <div class="wrap" style="position:relative; z-index:1;">
    <p class="eyebrow" style="color:var(--brass-bright);" data-aos="fade-down">Frequently Asked Questions</p>
    <h1 data-aos="fade-right" data-aos-delay="100">Your questions, answered</h1>
    <p class="lede" style="max-width:580px; text-shadow:0 2px 10px rgba(0,0,0,0.8);" data-aos="fade-up" data-aos-delay="150">
      Everything you need to know before reaching out. Can't find what you're looking for? Send a message directly.
    </p>
  </div>
</section>

<section class="section">
  <div class="wrap">
    <div style="display:grid; grid-template-columns: 1fr min(260px, 30%); gap:64px; align-items:start;" class="faq-layout">

      {{-- Main FAQ --}}
      <div>

        <p class="eyebrow" style="margin-bottom:24px;" data-aos="fade-up">Getting started</p>

        <div class="faq-item" data-aos="fade-up">
          <button class="faq-question" aria-expanded="false" id="faq-q1" aria-controls="faq-a1">
            Do you offer a free initial consultation?
            <span class="faq-icon" aria-hidden="true">+</span>
          </button>
          <div class="faq-answer" id="faq-a1" role="region" aria-labelledby="faq-q1">
            <div class="faq-answer-inner">
              <p>Yes. An initial consultation is offered at no charge. You can reach out via WhatsApp or the contact form to describe your matter briefly, and we will arrange a time to speak. There is no obligation to proceed after the initial conversation.</p>
            </div>
          </div>
        </div>

        <div class="faq-item" data-aos="fade-up">
          <button class="faq-question" aria-expanded="false" id="faq-q2" aria-controls="faq-a2">
            What is the fastest way to contact you?
            <span class="faq-icon" aria-hidden="true">+</span>
          </button>
          <div class="faq-answer" id="faq-a2" role="region" aria-labelledby="faq-q2">
            <div class="faq-answer-inner">
              <p>WhatsApp is the quickest way to reach the chambers. Messages are typically responded to within one business day. For formal correspondence, use the contact form or send an email directly to <a href="mailto:{{ config('site.email') }}" style="color:var(--brass-bright);">{{ config('site.email') }}</a>.</p>
            </div>
          </div>
        </div>

        <div class="faq-item" data-aos="fade-up">
          <button class="faq-question" aria-expanded="false" id="faq-q3" aria-controls="faq-a3">
            Do I need to visit in person?
            <span class="faq-icon" aria-hidden="true">+</span>
          </button>
          <div class="faq-answer" id="faq-a3" role="region" aria-labelledby="faq-q3">
            <div class="faq-answer-inner">
              <p>Not necessarily. Many matters, including initial advice, contract reviews, and compliance queries, can be handled remotely via phone, WhatsApp, or email. For matters requiring formal instructions or document execution, an in-person or virtual meeting will be arranged as appropriate.</p>
            </div>
          </div>
        </div>

        <p class="eyebrow" style="margin-top:48px; margin-bottom:24px;" data-aos="fade-up">Fees & billing</p>

        <div class="faq-item" data-aos="fade-up">
          <button class="faq-question" aria-expanded="false" id="faq-q4" aria-controls="faq-a4">
            How are your fees structured?
            <span class="faq-icon" aria-hidden="true">+</span>
          </button>
          <div class="faq-answer" id="faq-a4" role="region" aria-labelledby="faq-q4">
            <div class="faq-answer-inner">
              <p>Fees are discussed and agreed upfront before any work begins. Depending on the nature of the matter, fees may be structured as:</p>
              <ul>
                <li>A fixed fee for defined tasks (e.g. contract drafting, document review)</li>
                <li>An hourly rate for advisory or ongoing matters</li>
                <li>A retainer arrangement for organisations requiring regular counsel</li>
              </ul>
              <p>There are no hidden charges. All costs are communicated clearly at the outset.</p>
            </div>
          </div>
        </div>

        <div class="faq-item" data-aos="fade-up">
          <button class="faq-question" aria-expanded="false" id="faq-q5" aria-controls="faq-a5">
            Do you work with NGOs and international organisations?
            <span class="faq-icon" aria-hidden="true">+</span>
          </button>
          <div class="faq-answer" id="faq-a5" role="region" aria-labelledby="faq-q5">
            <div class="faq-answer-inner">
              <p>Yes. A significant portion of the practice is dedicated to supporting NGOs, civil society organisations, donor-funded programmes, and international development agencies operating in Nigeria. Services include NGO registration, governance advisory, MOU and partnership agreements, regulatory compliance, and local counsel support for cross-border matters.</p>
            </div>
          </div>
        </div>

        <p class="eyebrow" style="margin-top:48px; margin-bottom:24px;" data-aos="fade-up">Practice areas</p>

        <div class="faq-item" data-aos="fade-up">
          <button class="faq-question" aria-expanded="false" id="faq-q6" aria-controls="faq-a6">
            What areas of law do you cover?
            <span class="faq-icon" aria-hidden="true">+</span>
          </button>
          <div class="faq-answer" id="faq-a6" role="region" aria-labelledby="faq-q6">
            <div class="faq-answer-inner">
              <p>The chambers handles a broad range of matters, including:</p>
              <ul>
                <li>Corporate & Commercial Law</li>
                <li>Civil Litigation & Dispute Resolution</li>
                <li>Property & Real Estate Law</li>
                <li>Family Law</li>
                <li>Criminal Defence</li>
                <li>NGO, Development & International Collaboration</li>
                <li>Fundamental Rights Enforcement</li>
                <li>Employment & Labour Law</li>
              </ul>
              <p>View the full <a href="{{ route('practice-areas') }}" style="color:var(--brass-bright);">Practice Areas</a> page for more detail.</p>
            </div>
          </div>
        </div>

        <div class="faq-item" data-aos="fade-up">
          <button class="faq-question" aria-expanded="false" id="faq-q7" aria-controls="faq-a7">
            Do you handle matters outside Owerri / Imo State?
            <span class="faq-icon" aria-hidden="true">+</span>
          </button>
          <div class="faq-answer" id="faq-a7" role="region" aria-labelledby="faq-q7">
            <div class="faq-answer-inner">
              <p>Yes. While the chambers is based in Owerri, Imo State, matters are handled across Nigeria. Many advisory and transactional matters are managed remotely. For litigation requiring appearance in courts in other states, arrangements are made on a case-by-case basis. International organisations working with Nigerian partners are also welcomed.</p>
            </div>
          </div>
        </div>

        <div class="faq-item" data-aos="fade-up">
          <button class="faq-question" aria-expanded="false" id="faq-q8" aria-controls="faq-a8">
            Are communications kept confidential?
            <span class="faq-icon" aria-hidden="true">+</span>
          </button>
          <div class="faq-answer" id="faq-a8" role="region" aria-labelledby="faq-q8">
            <div class="faq-answer-inner">
              <p>Absolutely. All communications between a client and the chambers are protected by legal professional privilege. Nothing you share is disclosed to any third party without your explicit consent, except where required by law. Confidentiality is a fundamental obligation, not just a policy.</p>
            </div>
          </div>
        </div>

      </div>

      {{-- Sidebar --}}
      <aside data-aos="fade-left" data-aos-delay="200" style="position:sticky; top:100px;">
        <div class="card" style="padding:28px;">
          <div class="icon-badge" style="margin-bottom:16px;">
            <i class="fa fa-comments" aria-hidden="true"></i>
          </div>
          <h3 style="font-size:18px; margin-bottom:12px;">Still have questions?</h3>
          <p style="font-size:14px; opacity:0.8; margin-bottom:20px; line-height:1.6;">Send a brief description of your matter and get a direct response. No forms, no waiting rooms.</p>
          <a class="btn btn-primary" href="https://wa.me/{{ config('site.whatsapp_number') }}?text=Hello%2C%20I%20would%20like%20to%20enquire%20about%20your%20legal%20services." target="_blank" rel="noopener" style="width:100%; justify-content:center;">
            <i class="fa fa-whatsapp" aria-hidden="true"></i>
            Chat on WhatsApp
          </a>
          <a class="btn btn-ghost" href="{{ route('contact') }}" style="width:100%; justify-content:center; margin-top:10px;">
            <i class="fa fa-envelope-o" aria-hidden="true"></i>
            Contact form
          </a>
        </div>

        <div class="card" style="padding:28px; margin-top:20px;">
          <p class="eyebrow" style="margin-bottom:12px;">Part of</p>
          <a href="https://chukwunyere-chambers.org" target="_blank" rel="noopener" style="color:var(--brass-bright); font-family:'Fraunces',serif; font-size:15px;">
            Chukwunyere Chambers <i class="fa fa-external-link" style="font-size:11px;" aria-hidden="true"></i>
          </a>
          <p style="font-size:13px; opacity:0.7; margin-top:8px; line-height:1.5;">82/84 Wetheral Road, Owerri, Imo State, Nigeria.</p>
        </div>
      </aside>

    </div>
  </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.faq-question').forEach(btn => {
    btn.addEventListener('click', () => {
      const expanded = btn.getAttribute('aria-expanded') === 'true';
      const answerId = btn.getAttribute('aria-controls');
      const answer = document.getElementById(answerId);

      // Close all others
      document.querySelectorAll('.faq-question').forEach(b => {
        b.setAttribute('aria-expanded', 'false');
        const aId = b.getAttribute('aria-controls');
        document.getElementById(aId)?.classList.remove('open');
      });

      // Toggle clicked
      if (!expanded) {
        btn.setAttribute('aria-expanded', 'true');
        answer?.classList.add('open');
      }
    });
  });
});
</script>
@endpush

@endsection
