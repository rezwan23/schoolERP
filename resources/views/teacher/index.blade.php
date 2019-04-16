@extends('layouts.master')

@section('title', 'All Teachers')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title float-left">All Teachers</h3>
                <a href="{{route('teacher.create')}}" class="btn btn-sm btn-primary float-right">Add new</a>
                <div class="clearfix"></div>
                @include('layouts.messages')
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>email</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teachers as $teacher)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$teacher->name}}</td>
                            <td>{{$teacher->email}}</td>
                            <td><img width="150px" height="200px" src="{{'/uploads/'.$teacher->photo}}" alt=""></td>
                            <td>
                                <a href="{{route('teacher.edit', $teacher->id)}}" class="btn btn-sm btn-primary float-left" style="margin-right:4px;">Edit</a>
                                <form action="{{route('teacher.destroy', $teacher)}}" onsubmit="return confirm('Are You Sure?')" style="float:left" method="post">
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