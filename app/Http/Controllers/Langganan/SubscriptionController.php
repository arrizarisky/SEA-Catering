<?php

namespace App\Http\Controllers\Langganan;

use App\Models\Subscription;
use App\Models\User;
use App\Models\SubscriptionPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SubscriptionController extends Controller
{

    public function create()
    {
        $plans = SubscriptionPlan::all();
        return view('subscription.create', compact('plans'));
    }

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
        session(['subscription_data' => $request->all()]);
        return redirect()->route('subscriptions.payment');
    }

    public function payment() {
        $data = session('subscription_data');
        if (!$data) {
            return redirect()->route('subscriptions.create')->with('error', 'Data tidak ditemukan.');
        }
        $plan = SubscriptionPlan::find($data['plan_id']);
        return view('subscription.payment', compact('data', 'plan'));
    }

    public function confirm() {
        $data = session('subscription_data');
        if (!$data) {
            return redirect()->route('subscriptions.create')->with('error', 'Data tidak ditemukan.');
        }

        Subscription::create([
            'user_id' => Auth::id(),
            'subscription_plan_id' => $data['plan_id'],
            'full_name' => $data['full_name'],
            'phone_number' => $data['phone_number'],
            'meal_types' => json_encode($data['meal_types']),
            'delivery_days' => json_encode($data['delivery_days']),
            'allergies' => $data['allergies'],
            'total_price' => $data['total_price'],
            'address' => $data['address'],
            'notes' => $data['notes'] ?? null,
            'payment_method' => $data['payment_method'],
            'start_date' => now(),
            'end_date' => now()->addMonth(),
        ]);

        session()->forget('subscription_data');

        $user = \App\Models\User::find(Auth::id());
        if ($user && $user->role === 'user') {
            $user->role = 'pelanggan';
            $user->save();
        }
        return redirect()->route('subscriptions.success')->with('success', 'Langganan berhasil dibuat!');
    }
    

    public function success()
    {
        return view('subscription.success');
    }

    public function quickForm(SubscriptionPlan $plan)
    {
        $user = Auth::user();
        $last = $user->subscriptions()->latest()->first();

        return view('subscription.quick-form', [
            'plan' => $plan,
            'defaults' => [
                'full_name' => $user->name,
                'phone_number' => $last->phone_number ?? '',
                'meal_types' => json_decode($last->meal_types ?? '[]'),
                'delivery_days' => json_decode($last->delivery_days ?? '[]'),
                'allergies' => $last->allergies ?? '',
                'address' => $last->address ?? '',
                'payment_method' => 'transfer'
            ]
        ]);
    }


    public function quickBuy(Request $request)
    {
        $request->validate([
        'plan_id' => 'required|exists:subscription_plans,id',
        'phone_number' => 'required|string',
        'meal_types' => 'required|array|min:1',
        'delivery_days' => 'required|array|min:1',
        'payment_method' => 'required|in:transfer,ewallet,cash'
    ]);

    $plan = SubscriptionPlan::findOrFail($request->plan_id);
    $total = $plan->price * count($request->meal_types) * count($request->delivery_days) * 4.3;

    session([
        'subscription_data' => [
            'full_name' => $request->full_name ?? Auth::user()->name,
            'phone_number' => $request->phone_number,
            'meal_types' => $request->meal_types,
            'delivery_days' => $request->delivery_days,
            'allergies' => $request->allergies,
            'address' => $request->address,
            'payment_method' => $request->payment_method,
            'total_price' => $total,
            'plan_id' => $plan->id
        ]
    ]);

    return redirect()->route('subscriptions.payment');
    }


}
