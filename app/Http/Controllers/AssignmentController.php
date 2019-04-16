<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\CollegeClass;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('assignment.index', ['assignments'=>Assignment::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('assignment.create', ['classes'=>CollegeClass::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Assignment::create([
            'class_id'  =>  $request->class_id,
            'title' =>  $request->title,
            'content'   =>  $request->assignment,
            'submit_date'   =>  $request->submit_date,
        ]);
        return redirect()->route('assignment.index')->with('success-message', 'Assignment Created Successfully!');
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
    public function edit(Assignment $assignment)
    {
        return view('assignment.edit', ['assignment'=>$assignment, 'classes'=>CollegeClass::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assignment $assignment)
    {
        $assignment->update([
            'class_id'  =>  $request->class_id,
            'title' =>  $request->title,
            'content'   =>  $request->assignment,
            'submit_date'   =>  $request->submit_date,
        ]);
        return redirect()->route('assignment.index')->with('success-message','Assignment Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assignment $asssignment)
    {
        $asssignment->delete();
        return back()->with('success-message', 'assignment deleted successfully!');
    }
}
