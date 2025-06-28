<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserManagementControll extends Controller
{
    // Tampilkan semua user dengan detail langganan
    public function index()
    {
        $users = User::with(['activeSubscription.subscriptionPlan'])->where('role', 'pelanggan')->get();

        return view('admin.user.index', compact('users'));
    }

    // Update status aktif/nonaktif
    public function toggleStatus(User $user)
    {
        $user->is_active = !$user->is_active;
        $user->save();

        return redirect()->back()->with('success', 'Status pengguna berhasil diubah.');
    }
}
