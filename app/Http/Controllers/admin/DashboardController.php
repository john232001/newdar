<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $landholdings = DB::table('landholdings')->get();

        $totalLandholdings = DB::table('landholdings')->count();
        $totalLots = DB::table('lots')->count();
        $totalArbs = DB::table('arbs')->count();
        $totalAwardland = DB::table('awardtitles')->count();
        $totalAsp = DB::table('asps')->count();
        $totalUsers = DB::table('users')->count();
        $totalValuation = DB::table('valuations')->count();
        return view('dashboard', compact('landholdings', 'totalLandholdings', 'totalLots', 'totalArbs', 'totalAwardland', 'totalAsp', 'totalValuation','totalUsers'));
    }
}
