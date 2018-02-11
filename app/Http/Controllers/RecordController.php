<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Record;
use Session;

class RecordController extends Controller
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
        //create variabel and store all posts from database
        //$records = Record::all();
        $records = Record::paginate(5);
        //return a view and pass in the above variable
        return view('records.index')->withRecords($records);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('records.create');
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
            'exercise' => 'required|max:100',
            'value' => 'required|numeric',
            'unit' => 'required|max:20'
        ));

        //store data in database
        $record = new Record;

        $record->exercise = $request->exercise;
        $record->value = $request->value;
        $record->unit = $request->unit;

        $record->save();

        Session::flash("success","The record was successfully save!");

        return redirect()->route('records.show',$record->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $record = Record::find($id);
        return view('records.show')->with('record',$record);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $record = Record::find($id);
        //return the view
        return view('records.edit')->withRecord($record);
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
        //Validate the data
        $this->validate($request,array(
            'exercise' => 'required|max:100',
            'value' => 'required|numeric',
            'unit' => 'required|max:20'
        ));
        //Save the data to the database
        $record = Record::find($id);

        $record->exercise = $request->input('exercise');
        $record->value = $request->input('value');
        $record->unit = $request->input('unit');

        $record->save();
        //set flash data with success message
        Session::flash("success","The record was successfully saved!");

        //redirect with flash data to posts.show
        return redirect()->route('records.show',$record->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Record::find($id);

        $record->delete();

        //set flash data with success message
        Session::flash("success","The record was successfully deleted!");

        //redirect with flash data to posts.index
        return redirect()->route('records.index');
    }
}
