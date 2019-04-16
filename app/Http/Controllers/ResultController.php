<?php

namespace App\Http\Controllers;

use App\Models\CollegeClass;
use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('result.index', ['results'=>Result::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('result.create', ['classes'=>CollegeClass::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('result')){
            $result = $request->file('result')->store('/');
        }
        Result::create([
            'class_id'  =>  $request->class_id,
            'result'    =>  $result,
        ]);
        return redirect()->route('result.index')->with('success-message', 'Result Added Successfully!');
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
    public function edit(Result $result)
    {
        return view('result.edit', ['result' => $result]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $result)
    {
        if($request->hasFile('result')){
            $result = $request->file('result')->store('/');
        }
        $result->update([
            'class_id'  =>  $request->class_id,
            'result'    =>  $result,
        ]);
        return redirect()->route('result.index')->with('success-message', 'Result Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        $result->delete();
        return back()->with('success-message', 'Result Added Successfully!');
    }
}
