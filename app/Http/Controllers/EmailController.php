<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Silo;
use DB;
use App\User;
use App\Notifications\SilosVolume;

class EmailController extends Controller
{
    //
		public function checkVolume(){
		$silos = DB::table('silos')
            ->join('silo_types', 'silos.id', '=', 'silo_types.silo_id')
            ->select('silos.*', 'silo_types.type')
			->where('silos.volume', '>=', '90')
            ->get();
		
		if($silos->first()){
			return $this->sendMail();
		}else{
			return redirect('/home');
		}
	}
	
	public function sendMail(){
		$users = \App\User::all();
		foreach ($users as $user){
			$user->notify(new SilosVolume());
		}
		return redirect('/home');
	}
}
