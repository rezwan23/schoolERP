@extends('layouts.master')

@section('title','Site Info')

@section('content')

    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Site Info</h1>
            <p>Edit Site Info Here</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('layouts.messages')
            <form class="form-horizontal" method="post" action="{{route('meta')}}" enctype="multipart/form-data">
                @csrf
                <div class="tile">
                    <div class="tile-body">
                        <div class="form-group row">
                            <label class="control-label col-md-3">Site Title</label>
                            <div class="col-md-8">
                                <input class="form-control col-md-8" name="title" type="text" placeholder="Enter site title" value="{{!empty($meta->title)? $meta->title: ''}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3"> Logo</label>
                            <div class="col-md-4">
                                <input class="form-control" type="file" name="logo">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Address</label>
                            <div class="col-md-8">
                                <textarea class="form-control" rows="4" name="address" placeholder="Enter site address">{{!empty($meta->address)?$meta->address:''}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-8">
                                <input class="form-control col-md-8" name="email" type="text" placeholder="Enter Email" value="{{!empty($meta->email)? $meta->email: ''}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Phone</label>
                            <div class="col-md-8">
                                <input class="form-control col-md-8" name="phone" type="text" placeholder="Enter Phone" value="{{!empty($meta->phone)? $meta->phone: ''}}">
                            </div>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-3">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
