@extends('admin.layout')

@section('title', 'CMS Login')

@section('content')
<div style="max-width: 420px; margin: 60px auto;">
  <div class="card-panel" style="padding: 36px;">
    <div style="text-align: center; margin-bottom: 28px;">
      <i class="fa fa-balance-scale" style="font-size: 36px; color: var(--brass-bright); margin-bottom: 12px;"></i>
      <h2 style="font-family: 'Fraunces', serif; font-size: 24px; color: var(--brass-bright);">CMS Portal</h2>
      <p style="font-size: 13px; opacity: 0.7; margin-top: 4px;">Log in to manage articles & insights</p>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul style="list-style: none; padding: 0; margin: 0;">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('admin.login.submit') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="form-control" required>
      </div>

      <div class="form-group" style="display: flex; align-items: center; justify-content: space-between;">
        <label style="display: flex; align-items: center; gap: 8px; cursor: pointer; text-transform: none;">
          <input type="checkbox" name="remember" value="1"> Keep me logged in
        </label>
      </div>

      <button type="submit" class="btn-cms" style="width: 100%; justify-content: center; padding: 12px;">
        <i class="fa fa-sign-in"></i> Sign In
      </button>
    </form>
  </div>
</div>
@endsection
