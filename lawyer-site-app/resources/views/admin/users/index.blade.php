@extends('admin.layout')

@section('title', 'Manage User Roles')

@section('content')
<div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px;">
  <div>
    <h1 style="font-family: 'Fraunces', serif; font-size: 28px;">User Roles & Authors</h1>
    <p style="font-size: 14px; opacity: 0.7; margin-top: 4px;">Manage CMS users and role permissions (Admin vs Editor)</p>
  </div>
</div>

<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 24px;">
  <!-- User List -->
  <div class="card-panel">
    <h3 style="font-family: 'Fraunces', serif; font-size: 20px; margin-bottom: 16px;">CMS Users</h3>
    <div class="table-responsive">
      <table class="table-cms">
        <thead>
          <tr>
            <th>Name & Email</th>
            <th>Role</th>
            <th>Joined</th>
            <th style="text-align: right;">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
            <tr>
              <td>
                <strong>{{ $user->name }}</strong>
                <div style="font-size: 12px; opacity: 0.6;">{{ $user->email }}</div>
              </td>
              <td>
                <form action="{{ route('admin.users.update-role', $user->id) }}" method="POST" style="display: inline-flex; align-items: center; gap: 6px;">
                  @csrf
                  @method('PATCH')
                  <select name="role" onchange="this.form.submit();" style="background: var(--ink); border: 1px solid var(--hairline); color: var(--brass-bright); font-size: 12px; padding: 2px 6px; border-radius: 3px;">
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="editor" {{ $user->role === 'editor' ? 'selected' : '' }}>Editor</option>
                  </select>
                </form>
              </td>
              <td style="font-size: 12px; opacity: 0.7;">{{ $user->created_at->format('M d, Y') }}</td>
              <td style="text-align: right;">
                @if($user->id !== auth()->id())
                  <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Remove user {{ $user->name }}?');" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-cms btn-cms-danger" style="padding: 4px 10px; font-size: 11px;">Remove</button>
                  </form>
                @else
                  <span style="font-size: 11px; opacity: 0.5;">(You)</span>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <!-- Create New User Form -->
  <div>
    <div class="card-panel">
      <h3 style="font-family: 'Fraunces', serif; font-size: 20px; margin-bottom: 16px;">Add New User</h3>

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul style="padding-left: 16px; margin: 0; font-size: 13px;">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf

        <div class="form-group">
          <label for="name">Full Name *</label>
          <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
          <label for="email">Email Address *</label>
          <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
          <label for="password">Password *</label>
          <input type="password" id="password" name="password" class="form-control" required>
        </div>

        <div class="form-group">
          <label for="role">User Role *</label>
          <select id="role" name="role" class="form-control">
            <option value="editor" {{ old('role') === 'editor' ? 'selected' : '' }}>Editor (Can write & edit articles)</option>
            <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin (Full control)</option>
          </select>
        </div>

        <button type="submit" class="btn-cms" style="width: 100%; justify-content: center; margin-top: 10px;">
          <i class="fa fa-user-plus"></i> Create User
        </button>
      </form>
    </div>
  </div>
</div>
@endsection
