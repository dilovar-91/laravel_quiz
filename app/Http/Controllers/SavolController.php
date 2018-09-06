<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Savol;

class SavolController extends Controller
{
     public function __construct()
    {
        //$this->middleware('auth');
    }
    public function index()
    {
           $savolho = Savol::where(['id_fan' => 1])->get();
        return response()->json([
            'savolho'    => $savolho,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate(dd($request), [
        //    'savol'        => 'required|max:255',
        //    'javob' => 'required',
        // ]);
 
        $savol = Savol::create([
            'nomi_savol'        => request('nomi_savol'),
            'javob' => request('javob'),
           // 'user_id'     => Auth::user()->id
        ]);
 
        return response()->json([
            'savol'    => $savol,
            'message' => 'Success'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(savol $savol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(savol $savol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, savol $savol)
    {
       // $this->validate(dd($request), [
       //     'savol'        => 'required|max:255',
       //      'javob' => 'required',
       //  ]);
 
        $savol->nomi_savol = request('nomi_savol');
        $savol->javob = request('javob');
        $savol->save();
 
        return response()->json([
            'message' => 'savol updated successfully!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(savol $savol)
    {
         $savol->delete();
        return response()->json([
            'message' => 'savol deleted successfully!'
        ], 200);
    }

}
