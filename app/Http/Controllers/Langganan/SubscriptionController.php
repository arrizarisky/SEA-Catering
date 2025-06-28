<?php

namespace App\Http\Controllers\Langganan;

use App\Models\Subscription;
use App\Models\SubscriptionPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SubscriptionController extends Controller
{

      // Tampilkan form langganan
    public function create()
    {
        $plans = SubscriptionPlan::all();
        return view('subscription.create', compact('plans'));
    }

    // Hitung total harga berdasarkan input form (AJAX)
    public function calculate(Request $request)
    {
        $request->validate([
            'plan_id' => 'required|exists:subscription_plans,id',
            'meal_types' => 'required|array|min:1',
            'delivery_days' => 'required|array|min:1'
        ]);

        $plan = SubscriptionPlan::findOrFail($request->plan_id);
        $pricePerMeal = $plan->price;
        $total = $pricePerMeal * count($request->meal_types) * count($request->delivery_days) * 4.3;

        return response()->json([
            'total_price' => number_format($total, 2, ',', '.'),
            'raw_total' => $total
        ]);
    }

    // Simpan langganan baru setelah konfirmasi pembayaran
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone_number' => 'required|regex:/^08[0-9]{8,11}$/',
            'plan_id' => 'required|exists:subscription_plans,id',
            'meal_types' => 'required|array|min:1',
            'delivery_days' => 'required|array|min:1',
            'allergies' => 'nullable|string',
            'total_price' => 'required|numeric',
            'address' => 'nullable|string',
            'notes' => 'nullable|string',
            'payment_method' => 'required|in:cash,transfer,ewallet'
        ]);

        Subscription::create([
            'user_id' => Auth::id(),
            'subscription_plan_id' => $request->plan_id,
            'full_name' => $request->full_name,
            'phone_number' => $request->phone_number,
            'meal_types' => json_encode($request->meal_types),
            'delivery_days' => json_encode($request->delivery_days),
            'allergies' => $request->allergies,
            'total_price' => $request->total_price,
            'address' => $request->address,
            'notes' => $request->notes,
            'payment_method' => $request->payment_method,
            'start_date' => now(),
            'end_date' => now()->addMonth(),
        ]);
        $user = \App\Models\User::find(Auth::id());
        if ($user && $user->role === 'user') {
            $user->role = 'pelanggan';
            $user->save();
        }
        return redirect()->route('subscriptions.success')->with('success', 'Langganan berhasil dibuat!');
    }

    // Tampilkan halaman sukses setelah simpan
    public function success()
    {
        return view('subscriptions.success');
    }
}
