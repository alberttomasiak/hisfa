<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Silo;

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
        $garbage_silos = Silo::where('type', '=', 'garbage')->get();
        $stock_silos = Silo::where('type', '=', 'stock')->get();

        return view('home', compact('garbage_silos', 'stock_silos'));
    }
}
