@extends('layouts.master')

@section('title', 'Profile Edit')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('layouts.messages')
            <div class="tile">
                <h3 class="tile-title">Edit Profile</h3>
                <form action="{{route('profile')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="tile-body">
                    <div class="form-group">
                        <label class="control-label">Name</label>
                        <input class="form-control" name="name" type="text" value="{{$user->name}}" placeholder="Enter full name">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Photo</label>
                        <input class="form-control" type="file" name="photo">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Change password</label>
                        <button class="btn btn-primary btn-sm" onclick="event.preventDefault()" data-target="#myModal" data-toggle="modal">Change Password</button>
                    </div>
                </div>
                <div class="tile-footer">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Password</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('password.change')}}" method="post">
                        @csrf
                        <label for="">Old Password</label>
                        <input type="password" required name="old_password" class="form-control">
                        <label for="">Password</label>
                        <input type="password" required name="password" class="form-control">
                        <label for="">Confirm Password</label>
                        <input type="password" required name="password_confirmation" class="form-control">
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection