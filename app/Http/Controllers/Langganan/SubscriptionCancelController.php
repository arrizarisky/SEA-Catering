<?php

namespace App\Http\Controllers\Langganan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubscriptionCancelController extends Controller
{
    public function cancel()
    {
        $subscription = Auth::user()->activeSubscription;

        $subscription->update([
            'end_date' => now(),
            'notes' => 'Langganan dibatalkan oleh pengguna.'
        ]);

        return back()->with('success', 'Langganan berhasil dibatalkan.');
    }

}
