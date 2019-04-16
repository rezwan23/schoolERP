<?php

namespace App\Http\Controllers;

use App\Models\CollegeClass;
use App\Models\TimeTable;
use Illuminate\Http\Request;

class TimeTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('time-table.index', ['times'    =>  TimeTable::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('time-table.create', ['classes'=>CollegeClass::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $classId = $request->class_id;
        if(CollegeClass::find($classId)->time->count()>0){
            return back()->withErrors(['error-message'=>'Time Table Has Been Set For ths Class']);
        }
        if($request->hasFile('time_table')){
            $data['time_table'] = $request->file('time_table')->store('/');
        }
        TimeTable::create([
            'class_id'  =>  $request->class_id,
            'time_table'    => $data['time_table'],
        ]);
        return redirect()->route('time.index')->with('success-message', 'Time Table Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TimeTable $time)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TimeTable $time)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimeTable $time)
    {
        $time->delete();
        return back()->with('success-message', 'Time table Deleted Successfully!');
    }
}
