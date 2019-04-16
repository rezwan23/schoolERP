@extends('layouts.master')

@section('title', 'Add New Time Table')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title flaot-left">Add Time Table</h3>
                <a href="{{route('time.index')}}" class="btn btn-primary">All time Table</a>
                @include('layouts.messages')
                <form action="{{route('time.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label">Class</label>
                            <select name="class_id" id="" class="form-control">
                                @foreach($classes as $option)
                                    <option value="{{$option->id}}">{{$option->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Time Table</label>
                            <input class="form-control" type="file" name="time_table">
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
