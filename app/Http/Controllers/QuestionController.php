<?php

namespace App\Http\Controllers;
use App\Question;
use App\Result;
use Illuminate\Support\Facades\DB;
use App\Fan;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Faker\Generator;


class QuestionController extends Controller
{
   
   
	public function index($id_fan=1, $kat="A")
	{
	  //return response(Question::Where('id_fan', $id_fan)->Where('kategoriya', $kat)->jsonSerialize(), Response::HTTP_OK);

	  $q = Question::Where('id_fan', $id_fan)->Where('kategoriya', $kat)->get();
	  return response()->json($q, 200);
	}

	public function sanjish($id_fan=1, $kat="A")
	{
	$data = DB::select(DB::raw("SELECT s.`id_fan`, f.`nomi_fan`, s.`kategoriya` as kat FROM savolho s  LEFT JOIN fan f   ON f.`id` = s.`id_fan` GROUP BY s.id_fan; "));
	$fan = Fan::find($id_fan);
	 return view('sanjish', compact('id_fan', 'kat', 'fan', 'data'));
	}

	public function save_result(Request $result)
	{
	  $Result = new Result();
        $Result->id_user = 5;
        $Result->natija = $result->result;
         $Result->save();
	}

}
