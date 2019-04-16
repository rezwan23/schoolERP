@extends('layouts.master')

@section('title', 'Create Event')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="float-left tile-title">
                    All Events
                </h3>
                <a href="{{route('event.create')}}" class="btn btn-primary btn-sm float-right">New Event</a>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>View</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($events as $event)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$event->name}}</td>
                            <td><a href="{{$event->link}}" class="btn btn-primary btn-sm">View</a></td>
                            <td>
                                <form action="{{route('event.destroy', $event)}}" method="post" onsubmit="return confirm('Are You Sure?')">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-warning btn-sm" type="submit">Delete</button>
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