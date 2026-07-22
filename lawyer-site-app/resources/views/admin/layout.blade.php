<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Admin Dashboard') &mdash; {{ config('site.owner_name') }} CMS</title>
<meta name="theme-color" content="#14181c">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,300;9..144,400;9..144,600&family=IBM+Plex+Mono:wght@400;500&family=IBM+Plex+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  :root {
    --ink: #14181c;
    --ink-2: #1b2126;
    --ink-card: #20272e;
    --parchment: #e9e2cf;
    --parchment-dim: #a59e8c;
    --brass: #b08d3e;
    --brass-bright: #d4af5f;
    --hairline: #2e353d;
  }

  * { box-sizing: border-box; margin: 0; padding: 0; }
  body {
    background: var(--ink);
    color: var(--parchment);
    font-family: 'IBM Plex Sans', sans-serif;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
  }

  a { color: inherit; text-decoration: none; }

  /* Admin Header */
  .admin-header {
    background: var(--ink-2);
    border-bottom: 1px solid var(--hairline);
    padding: 16px 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .admin-brand {
    display: flex;
    align-items: center;
    gap: 12px;
    font-family: 'Fraunces', serif;
    font-size: 18px;
    color: var(--brass-bright);
  }

  .admin-nav {
    display: flex;
    align-items: center;
    gap: 20px;
  }

  .admin-nav a {
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-family: 'IBM Plex Mono', monospace;
    opacity: 0.75;
    transition: opacity 0.2s, color 0.2s;
  }

  .admin-nav a:hover, .admin-nav a.active {
    opacity: 1;
    color: var(--brass-bright);
  }

  .admin-user {
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 13px;
  }

  .badge-role {
    font-family: 'IBM Plex Mono', monospace;
    font-size: 10px;
    text-transform: uppercase;
    background: rgba(176, 141, 62, 0.2);
    color: var(--brass-bright);
    padding: 2px 8px;
    border-radius: 3px;
    border: 1px solid var(--brass);
  }

  .admin-container {
    max-width: 1100px;
    width: 100%;
    margin: 32px auto;
    padding: 0 24px;
    flex: 1;
  }

  .card-panel {
    background: var(--ink-card);
    border: 1px solid var(--hairline);
    padding: 24px;
    border-radius: 4px;
    margin-bottom: 24px;
  }

  .btn-cms {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: var(--brass);
    color: var(--ink);
    padding: 8px 16px;
    font-family: 'IBM Plex Mono', monospace;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-radius: 3px;
    font-weight: 600;
    border: none;
    cursor: pointer;
    transition: background 0.2s;
  }

  .btn-cms:hover {
    background: var(--brass-bright);
  }

  .btn-cms-secondary {
    background: transparent;
    border: 1px solid var(--hairline);
    color: var(--parchment);
  }

  .btn-cms-secondary:hover {
    background: rgba(255, 255, 255, 0.05);
    border-color: var(--brass-bright);
  }

  .btn-cms-danger {
    background: rgba(220, 53, 69, 0.2);
    border: 1px solid #dc3545;
    color: #ff6b6b;
  }
  .btn-cms-danger:hover {
    background: #dc3545;
    color: #fff;
  }

  .table-responsive {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    margin-top: 16px;
  }

  .table-cms {
    width: 100%;
    border-collapse: collapse;
    min-width: 600px;
  }
  .table-cms th, .table-cms td {
    padding: 12px 16px;
    text-align: left;
    border-bottom: 1px solid var(--hairline);
    font-size: 14px;
  }
  .table-cms th {
    font-family: 'IBM Plex Mono', monospace;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: var(--parchment-dim);
  }

  .form-group {
    margin-bottom: 20px;
  }
  .form-group label {
    display: block;
    font-family: 'IBM Plex Mono', monospace;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: var(--parchment-dim);
    margin-bottom: 8px;
  }
  .form-control {
    width: 100%;
    background: var(--ink);
    border: 1px solid var(--hairline);
    color: var(--parchment);
    padding: 10px 14px;
    border-radius: 3px;
    font-family: 'IBM Plex Sans', sans-serif;
    font-size: 14px;
  }
  .form-control:focus {
    outline: none;
    border-color: var(--brass-bright);
  }

  .alert {
    padding: 12px 16px;
    border-radius: 3px;
    margin-bottom: 20px;
    font-size: 14px;
  }
  .alert-success {
    background: rgba(40, 167, 69, 0.15);
    border: 1px solid #28a745;
    color: #5dd579;
  }
  .alert-danger {
    background: rgba(220, 53, 69, 0.15);
    border: 1px solid #dc3545;
    color: #ff6b6b;
  }

  /* Admin Mobile Responsiveness */
  @media (max-width: 768px) {
    .admin-header {
      flex-direction: column;
      align-items: stretch;
      gap: 16px;
      padding: 16px;
    }
    .admin-nav {
      flex-wrap: wrap;
      gap: 12px 16px;
      justify-content: flex-start;
    }
    .admin-user {
      border-top: 1px solid var(--hairline);
      padding-top: 12px;
      justify-content: space-between;
    }
    .admin-container {
      padding: 0 16px;
      margin: 20px auto;
    }
    .card-panel {
      padding: 16px;
    }
    div[style*="grid-template-columns: 1fr 1fr"],
    div[style*="grid-template-columns: 2fr 1fr"] {
      grid-template-columns: 1fr !important;
    }
  }
</style>
@stack('styles')
</head>
<body>

@auth
<header class="admin-header">
  <div class="admin-brand">
    <i class="fa fa-balance-scale"></i>
    <span>{{ config('site.owner_name') }} CMS</span>
  </div>

  <nav class="admin-nav">
    <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
    <a href="{{ route('admin.articles.index') }}" class="{{ request()->routeIs('admin.articles.*') ? 'active' : '' }}">Articles</a>
    @if(auth()->user()->isAdmin())
      <a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">User Roles</a>
    @endif
    <a href="{{ route('home') }}" target="_blank">View Site <i class="fa fa-external-link"></i></a>
  </nav>

  <div class="admin-user">
    <span>{{ auth()->user()->name }}</span>
    <span class="badge-role">{{ auth()->user()->role }}</span>
    <form action="{{ route('admin.logout') }}" method="POST" style="margin-left: 8px;">
      @csrf
      <button type="submit" class="btn-cms btn-cms-secondary" style="padding: 4px 10px; font-size: 11px;">Logout</button>
    </form>
  </div>
</header>
@endauth

<main class="admin-container">
  @if (session('status'))
    <div class="alert alert-success">
      <i class="fa fa-check-circle"></i> {{ session('status') }}
    </div>
  @endif

  @if (session('error'))
    <div class="alert alert-danger">
      <i class="fa fa-exclamation-circle"></i> {{ session('error') }}
    </div>
  @endif

  @yield('content')
</main>

@stack('scripts')
</body>
</html>
