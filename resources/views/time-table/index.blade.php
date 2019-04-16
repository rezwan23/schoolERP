@extends('layouts.master')

@section('title', 'All Time Tables')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title float-left">All Time Table</h3>
                <a href="{{route('time.create')}}" class="btn btn-primary float-right">Add New</a>
                <div class="tile-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Class</th>
                            <th>View</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($times as $time)
                            <td>{{$loop->index+1}}</td>
                            <td>{{$time->collegeClass->name}}</td>
                            <td><a href="{{asset('uploads/'.$time->time_table)}}" target="_blank" class="btn btn-success btn-sm">View</a></td>
                            <td>
                                <form action="{{route('time.destroy', $time)}}" method="post" onsubmit="return confirm('Are You Sure?')">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-warning btn-sm" type="submit">Delete</button>
                                </form>
                            </td>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection