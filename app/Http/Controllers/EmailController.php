<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Silo;
use DB;
use App\User;
use App\Notifications\SilosVolume;
use App\Notifications\SilosVolumeWaste;
use App\Notifications\SilosVolumePrime;

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
			$userPermissionsWaste = DB::table('users')
				->select('notification_waste')
				->where('notification_waste', '=', '1')
				->get();
			
			if($userPermissionsWaste->first()){
				$this->sendMailWaste();
			}
			
			$userPermissionsPrime = DB::table('users')
				->select('notification_prime')
				->where('notification_prime', '=', '1')
				->get();
			
			if($userPermissionsPrime->first()){
				$this->sendMailPrime();
			}

		}else{
			redirect('/home');
		}
	}
	
	public function sendMailWaste(){
		$users = \App\User::where('notification_waste', '=', '1')->get();
		foreach ($users as $user){
			$user->notify(new SilosVolumeWaste());
		}
		return redirect('/home');
	}
	
	public function sendMailPrime(){
		$users = \App\User::where('notification_prime', '=', '1')->get();
		foreach ($users as $user){
			$user->notify(new SilosVolumePrime());
		}
		return redirect('/home');
	}
}
