<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Silo;
use App\SiloType;
use App\User;
use App\Block;
use App\UserPermissions;
use DB;
use Illuminate\Contracts\Auth\Authenticatable;

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
        // account type achterhalen + optie's
        $loggedInUser = \Auth::user()->id;

        // opties ophalen voor de ingelogde user
        $account_options = DB::table('user_permissions')->where('user_id', '=', $loggedInUser)->pluck('options');

        // de id van ingelogde user ophalen uit user_permissions
        $account_id = DB::table('user_permissions')->where('user_id', '=', $loggedInUser)->pluck('user_id');

        $waste_silos = SiloType::with('silo')->where('type','=','waste')->get();
        $prime_silos = SiloType::with('silo')->where('type','=','prime')->get();
    	$silos = DB::table('silos')
            ->join('silo_types', 'silos.id', '=', 'silo_types.silo_id')
            ->select('silos.*', 'silo_types.type')
			->where('silos.volume', '>=', '90')
            ->get();

        $blocks = Block::with('length')->get();

        $logs = DB::table('logs')->orderBy('date', 'desc')->take(5)->get();
        $resources = DB::table('stocks')
                    ->join('stock_types', 'stocks.id', '=', 'stock_types.stock_id')
                    ->select('stocks.tonnage', 'stock_types.type')
                    ->get();

        return view('home', compact('account_id', 'blocks', 'account_options', 'account_type', 'prime_silos', 'waste_silos', 'silos', 'logs'));

    }
}
