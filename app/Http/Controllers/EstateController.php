<?php

namespace App\Http\Controllers;

use App\Estate;
use Session;
use Auth;
use Illuminate\Http\Request;

class EstateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $userid = Auth::id();
        $landlords = Estate::where('user_id', $userid)->paginate(2);
        return view('estates.index')->with('landlords', $landlords);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('estates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'apartmentname' => 'required',
            'price' => 'required',
            'location' => 'required',
            'description' => 'required',
            'picture' => 'required',
           
        ]);
        
        if(Estate::where('apartmentname', $request->apartmentname)->exists()){
            Session::flash('warning', 'This Apartment already exist in the database');
            return redirect()->back();
        }else{
        $featured = $request->picture;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/images', $featured_new_name);
        
        $save = Estate::create([
            'user_id' => Auth::id(),
            'apartmentname' => $request->apartmentname,
            'price' => $request->price,
            'location' => $request->location,
            'description' => $request->description,
            'picture' =>  'uploads/images/' .$featured_new_name,
            
        ]);
        

        Session::flash('success', 'Records successfully added');
        return redirect()->route('estate.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Estate  $estate
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Estate  $estate
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $estate = Estate::find($id);
        return view('estates.edit')->with('estate', $estate);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Estate  $estate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'apartmentname' => 'required',
            'price' => 'required',
            'location' => 'required',
            'description' => 'required',
           
        ]);

        $estate = Estate::find($id);

        if($request->hasfile('picture')){
            $featured = $request->picture;
            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/images', $featured_new_name);
            $estate->picture = 'uploads/images/' .$featured_new_name;  
           }

    
            $estate->apartmentname = $request->apartmentname;
            $estate->price  = $request->price;
            $estate->location =  $request->location;
            $estate->description = $request->description;

            $estate->save();
            
        
        Session::flash('success', 'Successfully Updated');
        return redirect()->route('estate.index');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Estate  $estate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $estate = Estate::find($id);
        $estate->delete();
        Session::flash('warning', 'Estate removed successfully');
        return redirect()->back();
    }
}
