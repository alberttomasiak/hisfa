<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Silo;
use App\SiloType;
use App\SiloContent;
use App\Notifications\SilosVolume;

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
        $silo = Silo::create($request->except(['_token', 'content', 'type']));

        SiloType::create([
            'type' => $request->input('type'),
            'silo_id' => $silo->id]);

        SiloContent::create([
            'content' => $request->input('content'),
            'silo_id' => $silo->id]);

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
        $silo = Silo::with('type', 'content')->findOrFail($id);

        $type = ($silo->type->type) ? $silo->type->type : '';

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
    public function update(Request $request, $id, $ajax = null)
    {
        $silo = Silo::findOrFail($id);

        $silo->number = $request->input('number');
        $silo->volume = $request->input('volume');
        $silo->save();

        $content = SiloContent::where('silo_id', $silo->id)->firstOrFail();

        $content->content = $request->input('content');
        $content->save();

        $type = SiloType::where('silo_id', $silo->id)->firstOrFail();

        $type->type = $request->input('type');
        $type->save();
		
		
		// Check volumes -> if any is 90% or fuller -> send mail to all users.
		app('App\Http\Controllers\EmailController')->checkVolume();
        if( $ajax ){
            // Will be automagically JSON ^^
            return compact('silo', 'content', 'type');
        } else {
            return redirect()->back();
        }
    }

    public function update_json(Request $request, $id){

        return $this->update($request, $id, true);

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
