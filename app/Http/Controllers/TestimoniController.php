<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubscriptionPlan;
use App\Models\Subscription;
use App\Models\Testimoni;
use Illuminate\Support\Facades\Auth;

class TestimoniController extends Controller
{

    public function index()
    {
        $testimonis = Testimoni::with(['user', 'subscriptionPlan'])->latest()->get();

        return view('testimoni.index', compact('testimonis'));
    }
    public function create(SubscriptionPlan $plan)
    {
        $user = Auth::user();

        // Cek apakah user pernah berlangganan paket ini
        $hasSubscribed = Subscription::where('user_id', $user->id)
            ->where('subscription_plan_id', $plan->id)
            ->exists();

        // Cek apakah sudah pernah beri testimoni untuk plan ini
        $alreadyReviewed = Testimoni::where('user_id', $user->id)
            ->where('subscription_plan_id', $plan->id)
            ->exists();

        if (!$hasSubscribed || $alreadyReviewed) {
            return redirect()->route('subscriptions.create')->with('error', 'Anda tidak dapat memberikan testimoni untuk paket ini.');
        }

        return view('testimoni.create', compact('plan'));
    }

    public function store(Request $request, SubscriptionPlan $plan)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'message' => 'required|string|max:500',
        ]);

        Testimoni::create([
            'user_id' => Auth::id(),
            'name' => Auth::user()->name,
            'subscription_plan_id' => $plan->id,
            'rating' => $request->rating,
            'message' => $request->message,
        ]);

        return redirect()->route('testimoni.index')->with('success', 'Terima kasih atas testimoni Anda!');
    }
}
