@extends('layouts.master')

@section('title', 'Issued Book')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="tile">
                <h3 class="tile-title">All Issued Books</h3>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Student</th>
                        <th>Book</th>
                        <th>Status</th>
                        <th>Return</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($records as $record)
                    <tr>
                        <td>{{$record->id}}</td>
                        <td>{{$record->student->name}}</td>
                        <td>{{$record->book->name}}</td>
                        <td>
                            @if($record->is_returned)
                                <span class="badge badge-success">Returned</span>
                            @else
                                <span class="badge badge-danger">Not returned</span>
                                @endif
                        </td>
                        <td>
                            @if(!$record->is_returned)
                            <a href="{{route('book.returned', $record)}}" class="btn btn-primary btn-sm">Return</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection