<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\natija;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class NatijaController extends Controller
{

   public function index()
    {
    
   

     //$id_user = Auth::id();
   
   
	//print_r($user);
    	$data = natija::leftJoin('fan', 'fan.id', '=', 'natija.id_fan')->Where('id_user', 5)->get();
    	$data = $data->toArray();
        return view('natija', compact('data'));
    }
}
