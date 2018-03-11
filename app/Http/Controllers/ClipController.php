<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clip;
use Session;

class ClipController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$clips = Clip::orderBy('id','desc')->paginate(5);
        return view('clips.index')->withClips(Clip::orderBy('id','desc')->paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clips.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data
        $this->validate($request,array(
            'name'        => 'required|max:255',
            'url'         => 'required|max:255'
        ));

        //store data in database
        $clip = new Clip;

        $clip->name = $request->name;
        $clip->url = $request->url;

        $clip->save();

        Session::flash("success","The clip was successfully save!");

        return redirect()->route('clips.show',$clip->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clip = Clip::find($id);
        return view('clips.show')->withClip($clip);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clip = Clip::find($id);
        return view('clips.edit')->withClip($clip);
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
         //validate the data
        $this->validate($request,array(
            'name'        => 'required|max:255',
            'url'         => 'required|max:255'
        ));

        //store data in database
        $clip = Clip::find($id);

        $clip->name = $request->name;
        $clip->url = $request->url;

        $clip->save();

        Session::flash("success","The clip was successfully updated!");

        return redirect()->route('clips.show',$clip->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clip = Clip::find($id);

        $clip->delete();

        //set flash data with success message
        Session::flash("success","The clip was successfully deleted!");

        //redirect with flash data to posts.index
        return redirect()->route('clips.index');
    }
}
