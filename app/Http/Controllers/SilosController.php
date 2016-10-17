<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Silo;
use App\SiloType;

class SilosController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$waste_silos = SiloType::with('silo')->where('type','=','waste')->get();
        $prime_silos = SiloType::with('silo')->where('type','=','prime')->get();
    
        return view('silos/index', compact('prime_silos', 'waste_silos'))
               ->with('title', 'Silos');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type = null)
    {
        $type = ($type == null) ? '' : $type;
        return view('silos/create', compact('type'))
               ->with('title', 'Silo creeëren');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        Silo::create($request->except(['_token']));

        return redirect()->action('SilosController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $silo = Silo::findOrFail($id);

        $type = '';

        return view('silos.create', compact('silo', 'type'))
               ->with('title', 'Silo aanpassen')
               ->with('button', 'Silo aanpassen')
               ->with('method', 'edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $silo = Silo::findOrFail($id);

        //dd($request->all());

        $silo->number = $request->input('number');
        $silo->volume = $request->input('volume');

        $silo->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Silo::find($id)->delete();

        return redirect()->back();
    }
}
