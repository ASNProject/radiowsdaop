<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VAmps;
use Illuminate\Support\Facades\DB;

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
        $data = VAmps::simplePaginate(10);
        return view('dashboard.data', compact('data'));
    }

    public function deleteAll()
    {
        DB::table('v_amps')->truncate();
        return redirect()->back()->with('success', 'All data has been deleted.');
    }
}
