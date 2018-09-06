<?php

namespace App\Http\Controllers;

use App\Savolho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
 
class SavolhoController extends Controller
{
   
    public function __construct()
    {
        //$this->middleware('auth');
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $data = DB::select(DB::raw("SELECT s.`id_fan`, f.`nomi_fan`, s.`kategoriya` as kat FROM savolho s  LEFT JOIN fan f   ON f.`id` = s.`id_fan` GROUP BY s.id_fan; "));
         return view('savolho', ['data'=>$data]);
    }

    }
