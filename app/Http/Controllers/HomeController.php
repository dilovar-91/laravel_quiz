<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
      
        
$data = DB::select(DB::raw("SELECT s.`id_fan`, f.`nomi_fan`, s.`kategoriya` as kat FROM savolho s  LEFT JOIN fan f   ON f.`id` = s.`id_fan` GROUP BY s.id_fan; "));
       
      
        return view('home', compact('data'));
    }


    public function login()
    {
        return view('login_home');
    }
}
