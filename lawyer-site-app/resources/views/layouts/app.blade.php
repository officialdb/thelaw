<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', config('site.owner_name')) &mdash; {{ config('site.owner_role') }} | Nigeria</title>
<meta name="description" content="@yield('description', 'Nnamdi Igwebuike Nwagwu is a Barrister & Solicitor in Nigeria associated with Chukwunyere Law Chambers. Expert legal advisory in Corporate Law, NGO Registration, Civil Litigation, and Property Law in Owerri, Imo State.')">
<meta name="keywords" content="@yield('keywords', 'Nnamdi Nwagwu, Nnamdi Igwebuike Nwagwu, lawyer Owerri, attorney Imo State, Chukwunyere Law Chambers, corporate lawyer Nigeria, NGO registration Nigeria, legal practitioner Owerri, civil litigation lawyer Nigeria, property lawyer Owerri')">
<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
<link rel="canonical" href="@yield('canonical', request()->url())">
<meta name="theme-color" content="#14181c">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="@yield('og_type', 'website')">
<meta property="og:url" content="{{ request()->url() }}">
<meta property="og:title" content="@yield('title', config('site.owner_name')) &mdash; {{ config('site.owner_role') }}">
<meta property="og:description" content="@yield('description', 'Legal advisory and representation by Nnamdi Igwebuike Nwagwu, Barrister & Solicitor at Chukwunyere Law Chambers, Owerri, Nigeria.')">
<meta property="og:image" content="@yield('og_image', asset('images/law_img.jpg'))">
<meta property="og:site_name" content="Nnamdi I. Nwagwu &mdash; Barrister & Solicitor">
<meta property="og:locale" content="en_US">

<!-- Twitter Cards -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:url" content="{{ request()->url() }}">
<meta name="twitter:title" content="@yield('title', config('site.owner_name')) &mdash; {{ config('site.owner_role') }}">
<meta name="twitter:description" content="@yield('description', 'Legal advisory and representation by Nnamdi Igwebuike Nwagwu, Barrister & Solicitor at Chukwunyere Law Chambers, Owerri, Nigeria.')">
<meta name="twitter:image" content="@yield('og_image', asset('images/law_img.jpg'))">

<!-- Structured Data (JSON-LD) for Search Engines -->
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "LegalService",
  "name": "Nnamdi I. Nwagwu - Barrister & Solicitor",
  "image": "{{ asset('images/law_img.jpg') }}",
  "@@id": "https://nnamdinwagwu.com/#legalservice",
  "url": "https://nnamdinwagwu.com",
  "telephone": "+2347070157195",
  "email": "chambers@nnamdinwagwu.com",
  "priceRange": "$$",
  "address": {
    "@@type": "PostalAddress",
    "streetAddress": "82/84 Wetheral Road",
    "addressLocality": "Owerri",
    "addressRegion": "Imo State",
    "postalCode": "460001",
    "addressCountry": "NG"
  },
  "geo": {
    "@@type": "GeoCoordinates",
    "latitude": 5.4833,
    "longitude": 7.0333
  },
  "parentOrganization": {
    "@@type": "LegalService",
    "name": "Chukwunyere Law Chambers",
    "url": "https://chukwunyere-chambers.org"
  },
  "employee": {
    "@@type": "Person",
    "name": "Nnamdi Igwebuike Nwagwu",
    "jobTitle": "Associate Barrister & Solicitor",
    "almaMater": ["Imo State University", "Nigerian Law School"],
    "knowsLanguage": ["English", "Igbo"]
  },
  "areaServed": ["Owerri", "Imo State", "Lagos", "Abuja", "Nigeria"],
  "knowsAbout": [
    "Corporate & Commercial Law",
    "NGO & International Development Governance",
    "Civil Litigation",
    "Fundamental Rights Enforcement",
    "Property & Real Estate Law"
  ]
}
</script>

<link rel="icon" type="image/svg+xml" href="/favicon.svg">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,300;9..144,400;9..144,500;9..144,600&family=IBM+Plex+Mono:wght@400;500&family=IBM+Plex+Sans:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<style>
  :root{
    --ink:#14181c;
    --ink-2:#1b2126;
    --parchment:#e9e2cf;
    --parchment-dim:#c9c0a6;
    --brass:#b08d3e;
    --brass-bright:#d4af5f;
    --burgundy:#6d2f2f;
    --hairline:#3a3f3a;
    --max:1180px;
  }

  *{box-sizing:border-box;}
  html,body{margin:0;padding:0;overflow-x:hidden;}

  body{
    background:
      radial-gradient(ellipse 1100px 700px at 50% -10%, #1f2530 0%, var(--ink) 55%),
      var(--ink);
    color:var(--parchment);
    font-family:'IBM Plex Sans', sans-serif;
    -webkit-font-smoothing:antialiased;
    min-height:100vh;
    display:flex;
    flex-direction:column;
  }

  a{ color:inherit; }

  ::selection {
    background: var(--brass-bright);
    color: var(--ink);
  }

  ::-webkit-scrollbar {
    width: 10px;
  }
  ::-webkit-scrollbar-track {
    background: var(--ink);
  }
  ::-webkit-scrollbar-thumb {
    background: var(--hairline);
    border-radius: 5px;
  }
  ::-webkit-scrollbar-thumb:hover {
    background: var(--brass);
  }

  .sr-only{
    position:absolute;
    width:1px;
    height:1px;
    padding:0;
    margin:-1px;
    overflow:hidden;
    clip:rect(0, 0, 0, 0);
    white-space:nowrap;
    border:0;
  }

  .wrap{
    width:100%;
    max-width: var(--max);
    margin:0 auto;
    padding: 0 clamp(20px, 5vw, 48px);
  }

  /* Header / nav */
  header.site{
    border-bottom:1px solid var(--hairline);
    position:sticky;
    top:0;
    background: var(--ink);
    z-index:50;
  }

  .site-nav{
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding: 18px 0;
    gap:20px;
  }

  .brandmark{
    display:flex;
    align-items:center;
    gap:12px;
    text-decoration:none;
  }

  .brandmark svg{ width:36px; height:36px; flex:0 0 auto; }

  .brandmark .btext{
    font-family:'Fraunces', serif;
    font-variant:small-caps;
    letter-spacing:.03em;
    font-size:17px;
    color: var(--parchment);
    line-height:1.2;
  }
  .brandmark .btext small{
    display:block;
    font-family:'IBM Plex Mono', monospace;
    font-variant:normal;
    letter-spacing:.18em;
    text-transform:uppercase;
    font-size:9.5px;
    color: var(--parchment-dim);
    margin-top:2px;
  }

  .nav-desktop{
    margin-left:auto;
    display:flex;
    align-items:center;
    gap: clamp(10px, 1.4vw, 22px);
    font-family:'IBM Plex Mono', monospace;
    font-size:11px;
    letter-spacing:.06em;
    text-transform:uppercase;
  }

  .nav-shell{
    margin-left:auto;
    display:none;
    align-items:center;
  }

  .nav-menu{
    display:flex;
    align-items:center;
  }

  .nav-menu > summary{
    list-style:none;
  }
  .nav-menu > summary::-webkit-details-marker{
    display:none;
  }

  .nav-toggle{
    display:none;
    align-items:center;
    gap:10px;
    background:transparent;
    color: var(--parchment);
    border:1px solid var(--hairline);
    font-family:'IBM Plex Mono', monospace;
    font-size:11.5px;
    letter-spacing:.12em;
    text-transform:uppercase;
    padding: 10px 14px;
    cursor:pointer;
    transition: border-color 160ms ease, color 160ms ease, background-color 160ms ease;
  }

  .nav-toggle:hover{
    border-color: var(--brass);
    color: var(--brass-bright);
    background: rgba(255,255,255,.02);
  }

  .nav-toggle .fa{
    font-size:14px;
  }

  .nav-menu[open] .nav-toggle{
    color: var(--brass-bright);
    border-color: var(--brass);
    background: rgba(255,255,255,.03);
  }

  nav.links{
    display:flex;
    align-items:center;
    gap: clamp(10px, 1.4vw, 22px);
    font-family:'IBM Plex Mono', monospace;
    font-size:11px;
    letter-spacing:.06em;
    text-transform:uppercase;
  }

  nav.links a{
    text-decoration:none;
    color: var(--parchment-dim);
    padding: 6px 0;
    white-space: nowrap;
    border-bottom: 1px solid transparent;
    transition: color 160ms ease, border-color 160ms ease;
  }
  nav.links a:hover,
  nav.links a[aria-current="page"]{
    color: var(--brass-bright);
    border-color: var(--brass);
  }

  .nav-cta{
    display:inline-flex;
    align-items:center;
    gap:8px;
    background: var(--brass);
    color: var(--ink) !important;
    padding: 8px 22px !important;
    border: 1px solid var(--brass);
    border-radius: 50px;
    text-decoration:none !important;
    font-family:'IBM Plex Mono', monospace;
    font-size:11px;
    letter-spacing:.08em;
    text-transform:uppercase;
    transition: background 160ms ease;
    white-space:nowrap;
  }
  .nav-cta:hover{ background: var(--brass-bright); }

  @media (max-width: 1040px){
    .site-nav{
      align-items:flex-start;
      padding: 14px 0;
    }

    .brandmark .btext{
      font-size:15px;
    }

    .nav-desktop{
      display:none;
    }

    .nav-shell{
      display:flex;
      margin-left:0;
      margin-top:2px;
      align-self:flex-start;
      position:relative;
    }

    .nav-toggle{
      display:inline-flex;
    }

    .nav-menu{
      align-items:flex-end;
    }

    nav.links{
      display:none;
      position:absolute;
      top: calc(100% + 12px);
      right: 0;
      flex-direction:column;
      align-items:stretch;
      gap:0;
      padding: 14px;
      min-width: min(320px, calc(100vw - 40px));
      background: rgba(20, 24, 28, .98);
      border: 1px solid var(--hairline);
      border-radius: 18px;
      box-shadow: 0 18px 36px rgba(0,0,0,.38);
      backdrop-filter: blur(8px);
    }

    .nav-menu[open] nav.links{
      display:flex;
      animation: nav-drop 180ms ease;
    }

    nav.links a{
      padding: 12px 0;
      border-bottom:none;
    }

    nav.links a + a{
      border-top:1px solid rgba(58, 63, 58, .8);
    }

    nav.links a.nav-cta{
      margin-top: 8px;
      width:100%;
      justify-content:center;
    }
  }

  @@keyframes nav-drop{
    from{
      opacity:0;
      transform: translateY(-6px);
    }
    to{
      opacity:1;
      transform: translateY(0);
    }
  }

  /* Main content spacing */
  main{ flex:1 1 auto; }

  .section{ padding: clamp(48px, 8vw, 88px) 0; }
  .section + .section{ border-top:1px solid var(--hairline); }

  .eyebrow{
    font-family:'IBM Plex Mono', monospace;
    font-size:11px;
    letter-spacing:.26em;
    text-transform:uppercase;
    color: var(--brass-bright);
    margin:0 0 14px;
  }

  h1, h2, h3{
    font-family:'Fraunces', serif;
    color: var(--parchment);
    margin:0 0 16px;
    line-height:1.2;
  }
  h1{ font-size: clamp(32px, 5vw, 48px); font-weight:500; }
  h2{ font-size: clamp(24px, 3.4vw, 32px); font-weight:500; }
  h3{ font-size: clamp(18px, 2.2vw, 21px); font-weight:500; }

  p{ line-height:1.7; color: var(--parchment-dim); }
  p.lede{ font-size: clamp(16px, 2vw, 19px); color: var(--parchment); font-weight:300; font-family:'Fraunces', serif; }

  .icon-badge{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    width:44px;
    height:44px;
    border:1px solid var(--hairline);
    color: var(--brass-bright);
    background: rgba(255,255,255,.02);
    margin-bottom:16px;
    font-size:16px;
    transition:
      transform 180ms ease,
      border-color 180ms ease,
      background-color 180ms ease,
      color 180ms ease,
      box-shadow 180ms ease;
    will-change: transform;
  }

  .icon-badge .fa{
    transition: transform 180ms ease, color 180ms ease;
  }

  .card:hover .icon-badge,
  .card:focus-within .icon-badge{
    transform: translateY(-2px);
    border-color: rgba(212, 175, 95, .55);
    background: rgba(212, 175, 95, .06);
    color: var(--brass);
    box-shadow: 0 10px 24px rgba(0, 0, 0, .18);
  }

  .card:hover .icon-badge .fa,
  .card:focus-within .icon-badge .fa{
    transform: scale(1.08);
  }

  .icon-inline{
    margin-right:10px;
    color: var(--brass-bright);
  }

  .btn .fa{
    font-size: 1em;
  }

  .btn{
    display:inline-flex;
    align-items:center;
    gap:10px;
    font-family:'IBM Plex Mono', monospace;
    font-size:12px;
    letter-spacing:.14em;
    text-transform:uppercase;
    text-decoration:none;
    padding: 13px 24px;
    border:1px solid var(--brass);
    transition: background 160ms ease, color 160ms ease, transform 160ms ease;
  }
  .btn-primary{ background: var(--brass); color: var(--ink); }
  .btn-primary:hover{ background: var(--brass-bright); transform: translateY(-1px); }
  .btn-ghost{ background:transparent; color: var(--parchment); }
  .btn-ghost:hover{ border-color: var(--brass-bright); color: var(--brass-bright); }

  .card{
    border:1px solid var(--hairline);
    padding: 26px;
    background: linear-gradient(180deg, rgba(255,255,255,.015), rgba(255,255,255,0) 40%);
    height:100%;
    transition: transform 250ms ease, box-shadow 250ms ease, border-color 250ms ease;
  }
  .card:hover{
    transform: translateY(-4px);
    border-color: var(--brass);
    box-shadow: 0 12px 32px rgba(0,0,0,0.4);
  }

  .grid{
    display:grid;
    gap: 22px;
  }
  .grid-2{ grid-template-columns: repeat(2, 1fr); }
  .grid-3{ grid-template-columns: repeat(3, 1fr); }
  @media (max-width: 780px){
    .grid-2, .grid-3{ grid-template-columns: 1fr; }
  }

  .docket-index{
    font-family:'IBM Plex Mono', monospace;
    font-size:11px;
    color: var(--brass-bright);
    letter-spacing:.1em;
    margin-bottom:10px;
  }

  /* Footer */
  footer.site{
    border-top:1px solid var(--hairline);
    padding: 40px 0 28px;
  }
  .footer-grid{
    display:flex;
    flex-wrap:wrap;
    justify-content:space-between;
    gap:24px;
    margin-bottom:24px;
  }
  .footer-addr{
    font-family:'IBM Plex Mono', monospace;
    font-size:12.5px;
    line-height:1.9;
    color: var(--parchment-dim);
  }
  .footer-addr strong{ color: var(--parchment); font-weight:500; }
  .footer-links{
    display:flex;
    flex-wrap:wrap;
    gap:12px 20px;
    font-family:'IBM Plex Mono', monospace;
    font-size:11.5px;
    letter-spacing:.08em;
    text-transform:uppercase;
  }
  .footer-links a{ text-decoration:none; color: var(--parchment-dim); }
  .footer-links a:hover{ color: var(--brass-bright); }
  .copyline{
    border-top:1px solid var(--hairline);
    padding-top:18px;
    font-family:'IBM Plex Mono', monospace;
    font-size:10.5px;
    letter-spacing:.1em;
    text-transform:uppercase;
    color:#726a56;
    text-align:center;
  }

  @@keyframes pulse-wa {
    0% { transform: scale(1); box-shadow: 0 8px 24px rgba(0,0,0,.35); }
    50% { transform: scale(1.08); box-shadow: 0 12px 32px rgba(212,175,95,.4); }
    100% { transform: scale(1); box-shadow: 0 8px 24px rgba(0,0,0,.35); }
  }

  .wa-float{
    position:fixed;
    right: clamp(16px, 3vw, 28px);
    bottom: clamp(16px, 3vw, 28px);
    z-index:60;
    display:inline-flex;
    align-items:center;
    gap:10px;
    background: var(--brass);
    color: var(--ink);
    text-decoration:none;
    padding: 13px 18px;
    border:1px solid var(--brass);
    border-radius: 50px;
    font-family:'IBM Plex Mono', monospace;
    font-size:12px;
    letter-spacing:.08em;
    text-transform:uppercase;
    box-shadow: 0 8px 24px rgba(0,0,0,.35);
    transition: background 160ms ease, transform 160ms ease;
    animation: pulse-wa 2s infinite;
  }
  .wa-float:hover{ background: var(--brass-bright); transform: translateY(-2px); animation: none; }
  .wa-float svg{ width:16px; height:16px; }

  @media (prefers-reduced-motion: reduce){
    .btn,
    nav.links a,
    .nav-cta,
    .nav-toggle,
    .icon-badge,
    .icon-badge .fa,
    .wa-float{
      transition:none !important;
    }

    .nav-menu[open] nav.links{
      animation:none;
    }

    .card:hover .icon-badge,
    .card:focus-within .icon-badge,
    .btn-primary:hover,
    .btn-ghost:hover,
    .wa-float:hover{
      transform:none;
      box-shadow:none;
    }
  }

  @media (max-width: 480px){
    .wa-float span{ display:none; }
    .wa-float{ padding:14px; border-radius:50%; }
  }
</style>
@stack('head')
</head>
<body>

<header class="site">
  <div class="wrap site-nav">
    <a class="brandmark" href="{{ route('home') }}">
      <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <circle cx="50" cy="50" r="47" fill="none" stroke="#b08d3e" stroke-width="1.5"/>
        <circle cx="50" cy="50" r="40" fill="none" stroke="#b08d3e" stroke-width="1" opacity=".6"/>
        <text x="50" y="58" text-anchor="middle" font-family="Fraunces, serif" font-size="28" fill="#d4af5f" font-style="italic">N&middot;I&middot;N</text>
      </svg>
      <span class="btext">
        Nnamdi I. Nwagwu
        <small>Barrister &amp; Solicitor</small>
      </span>
    </a>

    <nav class="nav-desktop links" aria-label="Primary">
      <a href="{{ route('home') }}" {{ request()->routeIs('home') ? 'aria-current=page' : '' }}>Home</a>
      <a href="{{ route('practice-areas') }}" {{ request()->routeIs('practice-areas') ? 'aria-current=page' : '' }}>Practice Areas</a>
      <a href="{{ route('about') }}" {{ request()->routeIs('about') ? 'aria-current=page' : '' }}>About</a>
      <a href="{{ route('blog.index') }}" {{ request()->routeIs('blog.*') ? 'aria-current=page' : '' }}>Articles</a>
      <a href="{{ route('contact') }}" {{ request()->routeIs('contact') ? 'aria-current=page' : '' }}>Contact</a>
      <a href="{{ route('faq') }}" {{ request()->routeIs('faq') ? 'aria-current=page' : '' }}>FAQ</a>
      <a href="https://chukwunyere-chambers.org" target="_blank" rel="noopener" style="color:var(--brass-bright);"><i class="fa fa-external-link icon-inline" aria-hidden="true"></i>Main Chambers</a>
      <a class="nav-cta" href="https://wa.me/{{ config('site.whatsapp_number') }}?text=Hello%2C%20I%20would%20like%20to%20enquire%20about%20your%20legal%20services." target="_blank" rel="noopener">
        Free consultation
      </a>
    </nav>

    <div class="nav-shell">
      <details class="nav-menu">
        <summary class="nav-toggle">
          <i class="fa fa-navicon" aria-hidden="true"></i>
          <span class="sr-only">Toggle navigation</span>
          <span aria-hidden="true">Menu</span>
        </summary>

        <nav class="links">
          <a href="{{ route('home') }}" {{ request()->routeIs('home') ? 'aria-current=page' : '' }}>Home</a>
          <a href="{{ route('practice-areas') }}" {{ request()->routeIs('practice-areas') ? 'aria-current=page' : '' }}>Practice Areas</a>
          <a href="{{ route('about') }}" {{ request()->routeIs('about') ? 'aria-current=page' : '' }}>About</a>
          <a href="{{ route('blog.index') }}" {{ request()->routeIs('blog.*') ? 'aria-current=page' : '' }}>Articles</a>
          <a href="{{ route('contact') }}" {{ request()->routeIs('contact') ? 'aria-current=page' : '' }}>Contact</a>
          <a href="{{ route('faq') }}" {{ request()->routeIs('faq') ? 'aria-current=page' : '' }}>FAQ</a>
          <a href="https://chukwunyere-chambers.org" target="_blank" rel="noopener" style="color:var(--brass-bright);"><i class="fa fa-external-link icon-inline" aria-hidden="true"></i>Main Chambers</a>
          <a class="nav-cta" href="https://wa.me/{{ config('site.whatsapp_number') }}?text=Hello%2C%20I%20would%20like%20to%20enquire%20about%20your%20legal%20services." target="_blank" rel="noopener">
            Free consultation
          </a>
        </nav>
      </details>
    </div>
  </div>
</header>

<main>
  @yield('content')
</main>

<footer class="site">
  <div class="wrap">
    <div class="footer-grid">
      <div class="footer-addr">
        <strong>{{ config('site.owner_name') }}</strong><br>
        {{ config('site.owner_role') }}<br>
        Associate, <a href="https://chukwunyere-chambers.org" target="_blank" rel="noopener" style="color:var(--brass-bright);">Chukwunyere Chambers</a><br>
        {{ config('site.address') }}<br>
        {{ config('site.phone_display') }}
      </div>
      <div class="footer-links">
        <a href="{{ route('practice-areas') }}">Practice Areas</a>
        <a href="{{ route('about') }}">About</a>
        <a href="{{ route('blog.index') }}">Articles</a>
        <a href="{{ route('contact') }}">Contact</a>
        <a href="https://chukwunyere-chambers.org" target="_blank" rel="noopener">Chukwunyere Chambers</a>
        <a href="https://wa.me/{{ config('site.whatsapp_number') }}?text=Hello%2C%20I%20would%20like%20to%20enquire%20about%20your%20legal%20services." target="_blank" rel="noopener">
          <i class="fa fa-whatsapp" aria-hidden="true"></i>
          WhatsApp
        </a>
      </div>
    </div>
    <div class="copyline">
      &copy; {{ date('Y') }} {{ config('site.owner_name') }} &middot; Associate at <a href="https://chukwunyere-chambers.org" target="_blank" rel="noopener" style="color:var(--brass-bright);">Chukwunyere Chambers</a> &middot; All rights reserved
    </div>
  </div>
</footer>

<a class="wa-float" href="https://wa.me/{{ config('site.whatsapp_number') }}?text=Hello%2C%20I%20would%20like%20to%20enquire%20about%20your%20legal%20services." target="_blank" rel="noopener" aria-label="Chat on WhatsApp">
  <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5.1-1.3A10 10 0 1 0 12 2Zm0 18.2a8.2 8.2 0 0 1-4.2-1.1l-.3-.2-3 .8.8-2.9-.2-.3A8.2 8.2 0 1 1 12 20.2Zm4.5-6.1c-.2-.1-1.5-.7-1.7-.8-.2-.1-.4-.1-.6.1-.2.2-.7.8-.8 1-.2.2-.3.2-.5.1-.2-.1-1-.4-1.9-1.2-.7-.6-1.2-1.4-1.3-1.6-.1-.2 0-.4.1-.5l.4-.4c.1-.1.2-.3.2-.4.1-.2 0-.3 0-.5 0-.1-.6-1.5-.8-2-.2-.5-.4-.4-.6-.4h-.5c-.2 0-.5.1-.7.3-.2.2-.9.9-.9 2.2s1 2.6 1.1 2.7c.1.2 2 3 4.7 4.2.7.3 1.2.5 1.6.6.7.2 1.3.2 1.8.1.5-.1 1.5-.6 1.8-1.2.2-.6.2-1.1.1-1.2-.1-.2-.3-.2-.5-.3Z"/></svg>
  <span>Chat on WhatsApp</span>
</a>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 800,
    once: true,
    offset: 50
  });

  document.addEventListener('DOMContentLoaded', () => {
    // Counter animation
    const counters = document.querySelectorAll('.counter');
    if (counters.length === 0) return;

    const animateCounters = () => {
      counters.forEach(counter => {
        const updateCount = () => {
          const target = +counter.getAttribute('data-target');
          const count  = +counter.innerText;
          const inc    = target / 150;
          if (count < target) {
            counter.innerText = Math.ceil(count + inc);
            setTimeout(updateCount, 15);
          } else {
            counter.innerText = target;
          }
        };
        updateCount();
      });
    };

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          animateCounters();
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.5 });

    observer.observe(counters[0].closest('.grid') || counters[0].parentElement);
  });

  // Smooth page exit fade on internal link clicks
  document.addEventListener('click', (e) => {
    const link = e.target.closest('a');
    if (
      !link ||
      link.target === '_blank' ||
      link.getAttribute('rel')?.includes('noopener') ||
      !link.href ||
      link.href.startsWith('mailto:') ||
      link.href.startsWith('tel:') ||
      link.href.startsWith('https://wa.me') ||
      new URL(link.href).origin !== location.origin
    ) return;

    e.preventDefault();
    const dest = link.href;
    document.body.style.transition = 'opacity 0.18s ease';
    document.body.style.opacity    = '0';
    setTimeout(() => { location.href = dest; }, 190);
  });

  // Fade body back in on page show (handles back/forward cache)
  window.addEventListener('pageshow', () => {
    document.body.style.transition = 'opacity 0.22s ease';
    document.body.style.opacity    = '1';
  });
</script>
@stack('scripts')
</body>
</html>
