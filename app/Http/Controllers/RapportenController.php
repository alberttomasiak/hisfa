<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;

class RapportenController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //$logs = DB::table('logs')->orderBy('date', 'desc')->get();

        $prime_logs = DB::table('logs')->where('data_type', '=', 'prime')->orderBy('date', 'desc')->get();

        $waste_logs = DB::table('logs')->where('data_type', '=', 'waste')->orderBy('date', 'desc')->get();

        $stock_logs = DB::table('logs')->where('data_type', '=', 'stock')->orderBy('date', 'desc')->get();

        return view('rapporten', compact('prime_logs', 'waste_logs', 'stock_logs'))
            ->with('title', 'Rapporten');
    }

}
