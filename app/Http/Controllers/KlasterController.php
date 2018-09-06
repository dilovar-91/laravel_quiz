<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class KlasterController extends Controller
{
     public function index($klaster=1)
    {
      
    	$data = Question::leftJoin('fan','fan.id','=', 'savolho.id_fan')->Where('savolho.klaster', $klaster)->groupBy('savolho.id_fan')->get();
        return view('klaster', compact('data', 'klaster'));
    }
}
