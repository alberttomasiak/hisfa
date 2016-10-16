<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Silo;
use App\SiloType;
use DB;

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
    	$silos = DB::table('silos')
            ->join('silo_types', 'silos.id', '=', 'silo_types.silo_id')
            ->select('silos.*', 'silo_types.type')
			->where('silos.volume', '>=', '90')
            ->get();
		
		$data['siloInhoud'] = $silos;
		
        return view('home', compact('prime_silos', 'waste_silos', 'silos'));
    }
}
