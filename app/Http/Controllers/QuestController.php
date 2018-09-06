<?php

namespace App\Http\Controllers;
use App\Quest;
use Illuminate\Http\Request;

class QuestController extends Controller
{
    public function index()
    {
        return Quest::where('id_fan', 1)
                      ->orderBy('id', 'desc')->get();
    }
    public function archived()
    {
        return Quest::where('archive', 1)
                       ->orderBy('id', 'asc')->get();
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|max:500'
        ]);
        return Quest::create(['body' => request('body')]);
    }
    public function edit(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|max:500'
        ]);
        $Quest = Quest::findOrFail($request->id);
        $Quest->body = $request->body;
        $Quest->save();
    }
    public function archive($id)
    {
        $Quest = Quest::findOrFail($id);
        $Quest->archive = ! $Quest->archive;
        $Quest->save();
    }
    public function destroy($id)
    {
        $Quest = Quest::findOrFail($id);
        $Quest->delete();
    }
}
