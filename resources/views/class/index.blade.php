@extends('layouts.master')

@section('title', 'All Classes')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title float-left">All Classes</h3>
                <a href="{{route('class.create')}}" class="btn btn-sm btn-primary float-right">Add new</a>
                <div class="clearfix"></div>
                @include('layouts.messages')
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($classes as $class)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$class->name}}</td>
                            <td>
                                <a href="{{route('class.edit', $class->id)}}" class="btn btn-sm btn-primary float-left" style="margin-right:4px;">Edit</a>
                                <form action="{{route('class.destroy', $class)}}" onsubmit="return confirm('Are You Sure?')" style="float:left" method="post">
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