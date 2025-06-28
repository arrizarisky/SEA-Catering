<?php

namespace App\Http\Controllers\Langganan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubscriptionPauseController extends Controller
{
        public function pause(Request $request)
    {
        $request->validate([
            'pause_start' => 'required|date|after_or_equal:today',
            'pause_end' => 'required|date|after:pause_start',
        ]);

        $subscription = Auth::user()->activeSubscription;

        $subscription->update([
            'notes' => 'Pause dari ' . $request->pause_start . ' sampai ' . $request->pause_end
        ]);

        return back()->with('success', 'Langganan berhasil di-pause.');
    }

}
