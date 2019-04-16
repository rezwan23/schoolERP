@extends('layouts.master')

@section('title', 'All Results')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title float-left">All Results</h3>
                <a href="{{route('result.create')}}" class="btn btn-primary float-right">Add New</a>
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
                        @foreach($results as $result)
                            <td>{{$loop->index+1}}</td>
                            <td>{{$result->collegeClass->name}}</td>
                            <td><a href="{{asset('uploads/'.$result->result)}}" target="_blank" class="btn btn-success btn-sm">View</a></td>
                            <td>
                                <form action="{{route('result.destroy', $result)}}" method="post" onsubmit="return confirm('Are You Sure?')">
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