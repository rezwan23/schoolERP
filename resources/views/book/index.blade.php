@extends('layouts.master')

@section('title', 'All Books')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title float-left">All Books</h3>
                <a href="{{route('book.create')}}" class="btn btn-sm btn-primary float-right">Add new</a>
                <div class="clearfix"></div>
                @include('layouts.messages')
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Author</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$book->name}}</td>
                            <td>{{$book->author}}</td>
                            <td>
                                <a href="{{route('book.edit', $book->id)}}" class="btn btn-sm btn-primary float-left" style="margin-right:4px;">Edit</a>
                                <form action="{{route('book.destroy', $book)}}" onsubmit="return confirm('Are You Sure?')" style="float:left" method="post">
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