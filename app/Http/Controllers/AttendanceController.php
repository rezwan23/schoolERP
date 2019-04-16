<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\CollegeClass;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $attendance = new Collection();
        if($request->filled('class_id') && $request->filled('date')){
            $attendance = Attendance::query()
                ->where('class_id', $request->get('class_id'))
                ->whereDate('date', $request->get('date'))->get();
        }
        return view('attendance.index', ['attendance'=>$attendance, 'classes'=>CollegeClass::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $students = new Collection();
        if($request->filled('class_id')){
            $students = CollegeClass::find($request->class_id)->students;
        }
        return view('attendance.create', ['classes'=>CollegeClass::all(), 'students'=>$students]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attendance = Attendance::where('class_id', $request->class_id)->whereDate('date', $request->date)->get();
        if(count($attendance)>0){
            return back()->withErrors(['error-message'=> 'Attendance Data Added Previously']);
        }
        foreach($request->student_id as $key=>$value){
            foreach($value as $k => $s_val){
                Attendance::create([
                    'date' => $request->date,
                    'class_id'  =>  $request->class_id,
                    'student_id'    =>  $s_val,
                    'present'  =>  $request->present[$key][$k],
                ]);
            }
        }
        return back()->with('success-message', 'Attnedance record Entered Successfully!');
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
    public function destroy($id)
    {
        //
    }
}
