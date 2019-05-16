@extends('layouts.master')

@section('title', 'SMS Group Create')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title float-left">SMS Group</h3>
                <a href="{{asset('file/sample_file.csv')}}" class="btn btn-primary float-right">Dowbload Sample File</a>
                <div class="clearfix"></div>
                <form action="{{route('sms.group.create')}}" method="post"enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label">Group Name</label>
                            <input class="form-control" required name="name" type="text" placeholder="Enter group name">
                        </div>
                        <div class="form-group">
                            <label class="control-label">File</label>
                            <input class="form-control" required name="list" type="file">
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection