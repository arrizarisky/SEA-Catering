<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Subscription;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index() {
        $start = $request->start_date ?? Carbon::now()->subMonth()->startOfMonth();
        $end = $request->end_date ?? Carbon::now()->endOfMonth();

        $subscriptions = Subscription::whereBetween('created_at', [$start, $end])->get();

        $langgananBaru = $subscriptions->count();
        $mrr = $subscriptions->sum('total_price');
        $aktif = Subscription::where('end_date', '>', now())->count();

        $growth = Subscription::selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->whereBetween('created_at', [$start, $end])
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return view('admin.dashboard', compact('langgananBaru', 'mrr', 'aktif', 'growth', 'start', 'end'));
    }
}
