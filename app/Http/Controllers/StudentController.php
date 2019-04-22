<?php

namespace App\Http\Controllers;

use App\Models\CollegeClass;
use App\Models\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.index', ['students'=>Student::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create', ['classes'=>CollegeClass::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name'  =>  'required',
            'gender' =>  '',
            'class_id'  =>  '',
            'email' => 'unique:users',
            'dob'   =>  '',
            'nationality'   =>  '',
            'nid_number'    =>  '',
            'permanent_address' =>  '',
            'present_address'   =>  '',
            'photo' =>  '',
            'roll'  =>  ''

        ]);
        $image = $request->file('photo');
        $name = $image->store('/');
        $data['photo'] = $name;
        $user = User::where('email', $data['email'])->first();
        if($user){
            $data['user_id']   = $user->id;
        }else{
            $user = User::create([
                'name'  =>  $data['name'],
                'email' =>  $data['email'],
                'role_id'   =>  3,
                'status'    =>  1,
                'password'  =>  Hash::make('12345678'),
                'photo' =>  $name
            ]);
            $data['user_id']   = $user->id;
        }

        Student::create($data);
        return back()->with('success-message', 'Student Added Successfully!');
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
    public function edit(Student $student)
    {
        return view('student.edit', ['student'=>$student, 'classes' =>  CollegeClass::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $data = $this->validate($request, [
            'name'  =>  'required',
            'gender' =>  'required',
            'dob'   =>  'required',
            'class_id'  =>  'required',
            'nationality'   =>  'required',
            'nid_number'    =>  'required',
            'permanent_address' =>  'required',
            'present_address'   =>  'required',
            'photo' =>  'image',
            'roll'  =>  'required',

        ]);
        if($request->hasFile('photo')){
            $data['photo'] = $request->file('photo')->store('/');
        }
        $student->update($data);
        return back()->with('success-message', 'Student Data updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $studentId = $student->id;
        $student->delete();
        $user = User::find($studentId);
        $user->delete();
        return back()->with('success-message', 'Student Deleted Successfully!');
    }
}
