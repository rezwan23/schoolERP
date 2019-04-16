@extends('layouts.master')

@section('title', 'Edit Class')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">Edit Class</h3>
                @include('layouts.messages')
                <form action="{{route('class.update', $class)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input class="form-control" type="text" name="name" value="{{$class->name}}" placeholder="Enter Class name">
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

