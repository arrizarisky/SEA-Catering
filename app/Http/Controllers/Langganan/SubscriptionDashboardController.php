<?php

namespace App\Http\Controllers\Langganan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class subscriptionDashboardController extends Controller
{
    
    public function index() {
        return view('subscription.dashboard');
    }

    public function subscriptionDashboard()
    {
        $user = Auth::user();
        $subscription = $user
            ->subscriptions()
            ->latest('start_date')
            ->with('subscriptionPlan')
            ->first();

        return view('subscription.account', compact('subscription'));
    }

    public function pause(Request $request)
{
    $request->validate([
        'pause_start' => 'required|date|after_or_equal:today',
        'pause_end' => 'required|date|after:pause_start',
    ]);

    $subscription = Auth::user()->subscriptions()
    ->where('is_cancelled', 0)
    ->latest('start_date')
    ->first();

    if (!$subscription) {
        return redirect()->route('subscription.account')->with('error', 'Langganan tidak ditemukan.');
    }

    $subscription->update([
        'is_paused' => 0,
        'pause_start' => $request->pause_start,
        'pause_end' => $request->pause_end,
    ]);

    $user = User::find(Auth::id());
    $user->is_active = 0; // Nonaktifkan akun
    $user->save();



    return redirect()->route('subscription.account')->with('success', 'Langganan berhasil di-pause.');
}

    public function cancel()
    {
        $subscription = Auth::user()->subscriptions()->latest()->first();

        if (!$subscription) {
            return redirect()->route('subscription.account')->with('error', 'Langganan Gagal Dicancel');
        }

    $subscription->is_cancelled = 1;
    $subscription->save();

    $user = User::find(Auth::id());
    $user->is_active = false; // Nonaktifkan akun
    $user->save();


        return redirect()->route('subscription.account')->with('success', 'Langganan berhasil Cancel');  
    }
}