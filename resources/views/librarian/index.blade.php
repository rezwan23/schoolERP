@extends('layouts.master')

@section('title', 'All Librarians')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title float-left">All Librarian</h3>
                <a href="{{route('librarian.create')}}" class="btn btn-sm btn-primary float-right">Add new</a>
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
                    @foreach($librarians as $librarian)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$librarian->name}}</td>
                            <td>{{$librarian->email}}</td>
                            <td><img width="150px" height="200px" src="{{'/uploads/'.$librarian->photo}}" alt=""></td>
                            <td>
                                <a href="{{route('librarian.edit', $librarian->id)}}" class="btn btn-sm btn-primary float-left" style="margin-right:4px;">Edit</a>
                                <form action="{{route('librarian.destroy', $librarian)}}" onsubmit="return confirm('Are You Sure?')" style="float:left" method="post">
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