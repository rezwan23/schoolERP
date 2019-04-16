@extends('layouts.master')

@section('title', 'All Users')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title float-left">All Students</h3>
                <a href="{{route('student.create')}}" class="btn btn-sm btn-primary float-right">Add new</a>
                <div class="clearfix"></div>
                @include('layouts.messages')
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Date of Birth</th>
                        <th>Class</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->getClass->name}}</td>
                            <td>{{$student->dob}}</td>
                            <td><img width="150px" height="200px" src="{{'/uploads/'.$student->photo}}" alt=""></td>
                            <td>
                                <a href="{{route('student.edit', $student->id)}}" class="btn btn-sm btn-primary float-left" style="margin-right:4px;">Edit</a>
                                <form action="{{route('student.destroy', $student)}}" onsubmit="return confirm('Are You Sure?')" style="float:left" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection