<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function login(){
        return view('auth.login');
    }
    public function adminHome()
    {
        $landholdings = DB::table('landholdings')->get();

        $totalLandholdings = DB::table('landholdings')->count();
        $totalLots = DB::table('lots')->count();
        $totalArbs = DB::table('arbs')->count();
        $totalAwardland = DB::table('awardtitles')->count();
        $totalAsp = DB::table('asps')->count();
        $totalUser = DB::table('users')->count();
        $totalValuation = DB::table('valuations')->count();
        return view('admin.dashboard', compact('landholdings','totalLandholdings','totalLots','totalArbs','totalAwardland','totalAsp','totalValuation','totalUser'));
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function staffHome()
    {
        $landholdings = DB::table('landholdings')->get();

        $totalLandholdings = DB::table('landholdings')->count();
        $totalLots = DB::table('lots')->count();
        $totalArbs = DB::table('arbs')->count();
        $totalAwardland = DB::table('awardtitles')->count();
        $totalAsp = DB::table('asps')->count();
        $totalValuation = DB::table('valuations')->count();
        return view('staff.dashboard', compact('landholdings','totalLandholdings','totalLots','totalArbs','totalAwardland','totalAsp','totalValuation'));
    }
}
