<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserManagementControll extends Controller
{

    public function index()
    {
        $users = User::with(['activeSubscription.subscriptionPlan'])->where('role', 'pelanggan')->get();

        return view('admin.user.index', compact('users'));
    }

    public function toggleStatus(User $user)
    {
        $user->is_active = !$user->is_active;
        $user->save();

        return redirect()->back()->with('success', 'Status pengguna berhasil diubah.');
    }
}
