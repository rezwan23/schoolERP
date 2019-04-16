<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teacher.index', ['teachers'=>Teacher::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacher.create');
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
            'email' =>  'required',
            'photo' =>  'required|image'
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
                'role_id'   =>  1,
                'status'    =>  1,
                'password'  =>  Hash::make('12345678'),
                'photo' => $name,
            ]);
            $data['user_id']   = $user->id;
        }
        Teacher::create($data);
        return back()->with('success-message', 'Teacher Added Successfully!');

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
    public function edit(Teacher $teacher)
    {
        return view('teacher.edit',['teacher'=>$teacher]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $data = $this->validate($request, [
            'name'  =>  'required',
            'photo' =>  'image',

        ]);
        if($request->hasFile('photo')){
            $data['photo'] = $request->file('photo')->store('/');
        }
        $teacher->update($data);
        return back()->with('success-message', 'Teacher Data updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->user()->delete();
        $teacher->delete();
        return back()->with('success-message', 'Teacher Data Deleted Successfully!');
    }
}
