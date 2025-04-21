<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VAmps;

class DashboardController extends Controller
{
    public function home(Request $request)
    {
        return view('dashboard.home');
    }

    public function chart(Request $request)
    {
        return view('dashboard.chart');
    }
    public function data(Request $request)
    {
        return view('dashboard.data');
    }
}
