<?php

namespace App\Http\Controllers;

use App\Models\Librarian;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LibrarianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('librarian.index', ['librarians'=>Librarian::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('librarian.create');
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
            'email' =>  'required|unique:users',
            'photo' =>  'required|image',
        ]);
        if($request->hasFile('photo')){
            $data['photo'] = $request->file('photo')->store('/');
        }
        $user = User::create([
            'name'  =>  $data['name'],
            'email' =>  $data['email'],
            'role_id'   =>  2,
            'status'    =>  1,
            'photo'     =>  $data['photo'],
            'password'  =>  Hash::make('12345678'),
        ]);
        $data['user_id']   = $user->id;
        Librarian::create($data);
        return back()->with('success-message', 'Librarian Created successfully!');
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
    public function edit(Librarian $librarian)
    {
        return view('librarian.edit', ['librarian'=>$librarian]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Librarian $librarian)
    {
        $data = $this->validate($request, [
            'name'  =>  'required',
            'photo' =>  'required|image',
        ]);
        if($request->hasFile('photo')){
            $data['photo'] = $request->file('photo')->store('/');
        }
        $librarian->update($data);
        return back()->with('success-message', 'Librarian Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Librarian $librarian)
    {
        $librarian->user()->delete();
        $librarian->delete();
        return back()->with('success-message', 'Librarian Deleted Successfully!');
    }
}
