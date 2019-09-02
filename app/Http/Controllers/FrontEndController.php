<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estate;
use Auth;
use Session;

class FrontEndController extends Controller
{
    //
    public function index(){

        $houses = Estate::all();
        return view('frontend.index')->with('houses', $houses);
    }

    public function guest(){
        $houses = Estate::all();
        return view('visitorsdashboard')->with('houses', $houses);
    }

    public function singlehouse($id){
        
        $house = Estate::findOrFail($id);
        return view('frontend.singlehouse')->with('house', $house);

    }

    public function create(){
        if(!Auth::id()){
            Session::flash('warning', 'Sorry! You need to be logged in to comment');
            return redirect()->route('login');
        }
    }
}
