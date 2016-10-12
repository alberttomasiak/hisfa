<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Silo;
use App\SiloType;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $waste_silos = SiloType::with('silo')->where('type','=','waste')->get();
        $prime_silos = SiloType::with('silo')->where('type','=','prime')->get();
    
        return view('home', compact('prime_silos', 'waste_silos'));
    }
}
