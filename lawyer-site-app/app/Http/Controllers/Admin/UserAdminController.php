<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserAdminController extends Controller
{
    public function index()
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Only administrators can manage users.');
        }

        $users = User::latest()->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    public function store(Request $request)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Only administrators can add users.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8',
            'role' => 'required|in:admin,editor',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        return back()->with('status', 'New user account created successfully!');
    }

    public function updateRole(Request $request, User $user)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Only administrators can change roles.');
        }

        $validated = $request->validate([
            'role' => 'required|in:admin,editor',
        ]);

        $user->update(['role' => $validated['role']]);
        return back()->with('status', "Role for {$user->name} updated successfully.");
    }

    public function destroy(User $user)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Only administrators can delete users.');
        }

        if ($user->id === auth()->id()) {
            return back()->withErrors(['user' => 'You cannot delete your own account.']);
        }

        $user->delete();
        return back()->with('status', 'User account removed.');
    }
}
