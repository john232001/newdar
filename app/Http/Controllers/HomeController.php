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
        $totalAwardland = DB::table('awardtitles')
            ->join('lots', 'lots.id', '=', 'awardtitles.lotNumber_id')
            ->select('lots.lotArea', 'awardtitles.*')
            ->sum('lotArea');

        $totalAsp = DB::table('asps')->count();
        $totalCarp = DB::table('lots')->where('lots.lotType_id', '1')->sum('lotArea');
        $totalValuation = DB::table('valuations')
            ->join('lots', 'lots.id', '=', 'valuations.lotNumber_id')
            ->select('lots.lotArea', 'valuations.*')
            ->sum('lotArea');
        
        return view('admin.dashboard', compact('landholdings','totalLandholdings','totalLots','totalArbs','totalAwardland','totalAsp','totalValuation','totalCarp'));
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
        $totalAwardland = DB::table('awardtitles')
            ->join('lots', 'lots.id', '=', 'awardtitles.lotNumber_id')
            ->select('lots.lotArea', 'awardtitles.*')
            ->sum('lotArea');
            
        $totalAsp = DB::table('asps')->count();
        $totalCarp = DB::table('lots')->where('lots.lotType_id', '1')->sum('lotArea');
        $totalValuation = DB::table('valuations')
            ->join('lots', 'lots.id', '=', 'valuations.lotNumber_id')
            ->select('lots.lotArea', 'valuations.*')
            ->sum('lotArea');
        

        return view('staff.dashboard', compact('landholdings','totalLandholdings','totalLots','totalArbs','totalAwardland','totalAsp','totalValuation','totalCarp'));
    }
}
