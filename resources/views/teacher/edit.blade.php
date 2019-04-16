@extends('layouts.master')

@section('title', 'Edit Teacher')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Edit Teacher</h3>
                @include('layouts.messages')
                <form action="{{route('teacher.update', $teacher)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input class="form-control" type="text" name="name" value="{{$teacher->name}}" placeholder="Enter full name">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Photo</label>
                            <input class="form-control" type="file" name="photo">
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

