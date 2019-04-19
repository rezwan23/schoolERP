@extends('layouts.master')

@section('title', 'All Roles')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-ttle float-left">All Roles</h3>
                <a href="{{route('role.create')}}" class="btn btn-primary btn-sm float-right">Add New</a>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Set Permission</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$role->name}}</td>
                            <td>
                                <a href="{{route('set-permission', $role)}}" class="btn btn-success btn-sm">Set Permission</a>
                            </td>
                            <td>
                                <a href="{{route('role.edit', $role)}}" class="btn btn-sm btn-warning">Edit Role</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection