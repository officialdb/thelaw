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

    <!-- Featured Sector: NGO & Development -->
    <div class="card" style="margin-top: 64px; padding: clamp(32px, 5vw, 64px);" id="ngo-development" data-aos="fade-up">
      <p class="eyebrow">Specialised Sector</p>
      <h2>NGO, Development & International Collaboration</h2>
      
      <p class="lede" style="margin-bottom: 32px;">
        At Chukwunyere Law Chambers, I provide legal advisory and representation to non-governmental organisations (NGOs), international development agencies, charitable foundations, faith-based organisations, civil society organisations (CSOs), donor-funded programmes, and humanitarian institutions operating in Nigeria or collaborating with Nigerian partners.
      </p>
      <p style="margin-bottom: 48px; max-width: 800px;">
        Recognising the legal and regulatory complexities facing the development sector, I offer practical legal solutions that promote compliance, accountability, transparency, and effective programme implementation.
      </p>

      <h3 style="margin-bottom: 24px; color: var(--brass-bright); border-bottom: 1px solid var(--hairline); padding-bottom: 16px;">Areas of Service</h3>
      
      <div class="grid grid-2" style="gap: 32px; margin-bottom: 48px;">
        
        <div>
          <h4 style="margin-bottom: 12px; font-family: var(--font-mono); text-transform: uppercase; font-size: 0.85rem; letter-spacing: 1px;">NGO Registration & Governance</h4>
          <ul style="list-style: none; padding: 0; margin: 0; opacity: 0.8; line-height: 1.6;">
            <li>&bull; Registration and incorporation of Incorporated Trustees</li>
            <li>&bull; Constitutions and governance documents</li>
            <li>&bull; Board governance and trustees' advisory</li>
            <li>&bull; Compliance with applicable Nigerian laws and regulations</li>
            <li>&bull; Corporate governance reviews</li>
          </ul>
        </div>

        <div>
          <h4 style="margin-bottom: 12px; font-family: var(--font-mono); text-transform: uppercase; font-size: 0.85rem; letter-spacing: 1px;">International Partnerships</h4>
          <ul style="list-style: none; padding: 0; margin: 0; opacity: 0.8; line-height: 1.6;">
            <li>&bull; Memoranda of Understanding (MOUs)</li>
            <li>&bull; Partnership and Collaboration Agreements</li>
            <li>&bull; Consortium Agreements</li>
            <li>&bull; Grant and Funding Agreements</li>
            <li>&bull; Cross-border cooperation arrangements</li>
            <li>&bull; Legal advisory for donor-funded programmes</li>
          </ul>
        </div>

        <div>
          <h4 style="margin-bottom: 12px; font-family: var(--font-mono); text-transform: uppercase; font-size: 0.85rem; letter-spacing: 1px;">Regulatory Compliance</h4>
          <ul style="list-style: none; padding: 0; margin: 0; opacity: 0.8; line-height: 1.6;">
            <li>&bull; Legal compliance reviews & internal policies</li>
            <li>&bull; Employment and labour law compliance</li>
            <li>&bull; Procurement and contracting advice</li>
            <li>&bull; Data protection and privacy compliance</li>
            <li>&bull; Anti-corruption and ethical compliance</li>
          </ul>
        </div>

        <div>
          <h4 style="margin-bottom: 12px; font-family: var(--font-mono); text-transform: uppercase; font-size: 0.85rem; letter-spacing: 1px;">Human Rights & Public Interest</h4>
          <ul style="list-style: none; padding: 0; margin: 0; opacity: 0.8; line-height: 1.6;">
            <li>&bull; Constitutional and human rights litigation</li>
            <li>&bull; Women's, children's, and disability rights</li>
            <li>&bull; Community rights & access to justice</li>
            <li>&bull; Rule of law & public interest litigation</li>
            <li>&bull; Civic participation and governance matters</li>
          </ul>
        </div>

        <div>
          <h4 style="margin-bottom: 12px; font-family: var(--font-mono); text-transform: uppercase; font-size: 0.85rem; letter-spacing: 1px;">Land & Community Development</h4>
          <ul style="list-style: none; padding: 0; margin: 0; opacity: 0.8; line-height: 1.6;">
            <li>&bull; Due diligence for community projects</li>
            <li>&bull; Land acquisition & property documentation</li>
            <li>&bull; Community engagement and consultation</li>
            <li>&bull; Resolution of land disputes affecting projects</li>
            <li>&bull; Support for infrastructure initiatives</li>
          </ul>
        </div>

        <div>
          <h4 style="margin-bottom: 12px; font-family: var(--font-mono); text-transform: uppercase; font-size: 0.85rem; letter-spacing: 1px;">Employment & Human Resources</h4>
          <ul style="list-style: none; padding: 0; margin: 0; opacity: 0.8; line-height: 1.6;">
            <li>&bull; Employment & volunteer contracts</li>
            <li>&bull; Staff policies and procedures</li>
            <li>&bull; Workplace investigations & disciplinary processes</li>
            <li>&bull; Labour disputes</li>
          </ul>
        </div>

        <div>
          <h4 style="margin-bottom: 12px; font-family: var(--font-mono); text-transform: uppercase; font-size: 0.85rem; letter-spacing: 1px;">Commercial & Procurement</h4>
          <ul style="list-style: none; padding: 0; margin: 0; opacity: 0.8; line-height: 1.6;">
            <li>&bull; Procurement, vendor & service contracts</li>
            <li>&bull; Consultancy & equipment purchase agreements</li>
            <li>&bull; Lease & construction contracts</li>
            <li>&bull; Risk allocation and contract management</li>
          </ul>
        </div>

        <div>
          <h4 style="margin-bottom: 12px; font-family: var(--font-mono); text-transform: uppercase; font-size: 0.85rem; letter-spacing: 1px;">Dispute Resolution & Cross-Border</h4>
          <ul style="list-style: none; padding: 0; margin: 0; opacity: 0.8; line-height: 1.6;">
            <li>&bull; Mediation, arbitration & court representation</li>
            <li>&bull; Contract, employment & land disputes</li>
            <li>&bull; Legal due diligence & local counsel services</li>
            <li>&bull; Coordination with foreign legal advisers</li>
          </ul>
        </div>

      </div>

      <div style="background: rgba(0,0,0,0.2); padding: 32px; border-radius: 4px; border-left: 4px solid var(--brass-bright);">
        <h3 style="margin-bottom: 16px;">Supporting Sustainable Development</h3>
        <p style="margin-bottom: 16px;">
          I recognise the important role played by development organisations in promoting education, healthcare, environmental protection, economic empowerment, access to justice, gender equality, humanitarian assistance, youth development, and community advancement.
        </p>
        <p style="margin-bottom: 16px;">
          My objective is to provide dependable legal support that enables organisations to pursue their missions confidently while complying with Nigerian law and maintaining the highest standards of governance.
        </p>
        <p style="margin-bottom: 0;">
          Whether you are establishing a new organisation, implementing a donor-funded project, entering into an international partnership, acquiring land for a development initiative, managing employment issues, or resolving legal disputes, I am committed to providing responsive, ethical, and solution-oriented legal services.
        </p>
      </div>

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
