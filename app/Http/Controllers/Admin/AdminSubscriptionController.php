<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;

class AdminSubscriptionController extends Controller
{
    public function index()
    {
        $users = \App\Models\User::with(['activeSubscription.subscriptionPlan'])
            ->where('role', 'pelanggan')
            ->get();

        return view('admin.user.index', compact('users'));
    }

    public function activate($id)
    {
        $subscription = Subscription::findOrFail($id);

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
