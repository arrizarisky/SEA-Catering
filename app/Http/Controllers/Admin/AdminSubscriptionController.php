<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;

class AdminSubscriptionController extends Controller
{
    // Tampilkan semua pelanggan dan langganan mereka
    public function index()
    {
        $users = \App\Models\User::with(['activeSubscription.subscriptionPlan'])
            ->where('role', 'pelanggan')
            ->get();

        return view('admin.user.index', compact('users'));
    }

    // Aktifkan ulang langganan yang di-pause
    public function activate($id)
    {
        $subscription = Subscription::findOrFail($id);

        // Validasi: hanya langganan yang sedang pause yang bisa diaktifkan
        if (!$subscription->is_paused) {
            return back()->with('error', 'Langganan ini tidak dalam keadaan pause.');
        }

        $subscription->update([
            'is_paused' => false,
            'pause_start' => null,
            'pause_end' => null,
        ]);

        return back()->with('success', 'Langganan berhasil diaktifkan kembali.');
    }
}
