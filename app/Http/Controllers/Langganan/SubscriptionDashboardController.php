<?php

namespace App\Http\Controllers\Langganan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class subscriptionDashboardController extends Controller
{
    public function index() {
        return view('pelanggan.dashboard');
    }
}
