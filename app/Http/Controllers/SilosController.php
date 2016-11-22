<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Silo;
use App\SiloType;
use App\SiloContent;
use App\Notifications\SilosVolume;
use DB;

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
		// account type achterhalen + optie's
		$loggedInUser = \Auth::user()->id;

		// opties ophalen voor de ingelogde user
		$account_options = DB::table('user_permissions')->where('user_id', '=', $loggedInUser)->pluck('options');

		// de id van ingelogde user ophalen uit user_permissions
		$account_id = DB::table('user_permissions')->where('user_id', '=', $loggedInUser)->pluck('user_id');


    	$waste_silos = SiloType::with('silo')->where('type','=','waste')->get();
        $prime_silos = SiloType::with('silo')->where('type','=','prime')->get();

        return view('silos/index', compact('prime_silos', 'waste_silos', 'account_options', 'account_id'))
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

		// account type achterhalen + optie's
		$loggedInUser = \Auth::user()->id;

		// opties ophalen voor de ingelogde user
		$account_options = DB::table('user_permissions')->where('user_id', '=', $loggedInUser)->pluck('options');

		// de id van ingelogde user ophalen uit user_permissions
		$account_id = DB::table('user_permissions')->where('user_id', '=', $loggedInUser)->pluck('user_id');

        return view('silos.add', compact('type', 'account_options', 'account_id'))
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
        /*$silo = Silo::create($request->except(['_token', 'content', 'type']));

        SiloType::create([
            'type' => $request->input('type'),
            'silo_id' => $silo->id]);

        SiloContent::create([
            'content' => $request->input('content'),
            'silo_id' => $silo->id]);*/

		$contents = $request->contents;
		$number = $request->number;
		$type = $request->type;
		$volume = $request->volume;

		$query_silos = DB::table('silos')->insert(['number' => $number, 'volume' => $volume]);

		if($query_silos){
			$lastSiloIDQuery = DB::table('silos')->orderBy('id', 'desc')->first();
			$newID = $lastSiloIDQuery->id;

			$query_silo_contents = DB::table('silo_contents')->insert(['silo_id' => $newID, 'content' => $contents]);

			if($query_silo_contents){
				$lastSiloIDQuery = DB::table('silos')->orderBy('id', 'desc')->first();
				$newID = $lastSiloIDQuery->id;

				$query_types = DB::table('silo_types')->insert(['silo_id' => $newID, 'type' => $type]);
			}
		}


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
		// account type achterhalen + optie's
		$loggedInUser = \Auth::user()->id;

		// opties ophalen voor de ingelogde user
		$account_options = DB::table('user_permissions')->where('user_id', '=', $loggedInUser)->pluck('options');

		// de id van ingelogde user ophalen uit user_permissions
		$account_id = DB::table('user_permissions')->where('user_id', '=', $loggedInUser)->pluck('user_id');


        $silo = Silo::with('type', 'content')->findOrFail($id);

        $type = ($silo->type->type) ? $silo->type->type : '';

        return view('silos.create', compact('silo', 'type', 'account_options', 'account_id'))
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
		if(strpos($type, "waste")){
			app('App\Http\Controllers\EmailController')->checkVolumeWaste();
		}else{
			app('App\Http\Controllers\EmailController')->checkVolumePrime();
		}

        if( $ajax ){
            // Will be automagically JSON ^^
            return compact('silo', 'content', 'type', 'account_options', 'account_id');
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
