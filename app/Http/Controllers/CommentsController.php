<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Comment;
use App\Estate;
use Auth;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
         
    }

    public function allcomments(){
        $comments = Comment::orderby('created_at', 'desc')->paginate(4);
        return view('comments.allcomments')->with('comments', $comments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $estate = Estate::findOrFail($id);
        
        $comments = Comment::where('estate_id', $id)->orderby('created_at','desc')->paginate(3);
       return view('comments.create')->with('estate', $estate)
                                    ->with('comments', $comments);    
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
            'body' => 'required',

        ]);
        
        $addcomment = Comment::create([
            'user_id' => Auth::id(),
            'estate_id' =>$request->id,
            'body' => $request->body,

        ]);

        Session::flash('success', 'Comment successfully added');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $comment = Comment::findOrFail($id);

        return view('comments.edit')->with('comment', $comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'body' => 'required',
        ]);
        $comment = Comment::findOrFail($id);

        $comment->body = $request->body;
        $comment->save();

        Session::flash('success', 'Update is successfully made');
        return redirect()->back();

            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $comment = Comment::findOrFail($id);
        $comment->delete();
        Session::flash('success', 'This comment is remove successfully');
        return redirect()->back();
    }
}
