<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function home()
    {
        return view('home.home');
    }
    public function about()
    {
        return view('home.about');
    }
    public function darleaders()
    {
        return view('home.darleader');
    }
    public function services()
    {
        return view('home.services');
    }
}
