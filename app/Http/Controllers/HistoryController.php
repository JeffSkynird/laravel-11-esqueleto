<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(){
        return History::all();
    }
    public function create(Request $request){
        $history = new History();
        $history->action = $request->action;
        $history->entity = $request->entity;
        $history->save();
        return $history;
    }
    public function delete($id){
        $history = History::find($id);
        $history->delete();
        return $history;
    }
}
