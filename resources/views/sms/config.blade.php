@extends('layouts.master')

@section('title', 'SMS Config')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="tile">
            <h3 class="tile-title">SMS Configuration</h3>
            <form action="{{route('sms.config')}}" method="post">
                @csrf
                <div class="tile-body">
                    <div class="form-group">
                        <label class="control-label">Username</label>
                        <input class="form-control" required name="username" type="text" value="{{!empty($config->username)?decrypt($config->username):''}}" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <input class="form-control" required name="password" type="text" placeholder="Enter password" value="{{!empty($config->password)?decrypt($config->password):''}}">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Masking Name</label>
                        <input class="form-control" required name="masking_name" type="text" placeholder="Enter masking name" value="{{!empty($config->masking_name)?decrypt($config->masking_name):''}}">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Quantity</label>
                        <input class="form-control" required name="quantity" type="number" value="{{!empty($config->quantity)?decrypt($config->quantity):''}}" min="0" placeholder="Enter sms quantity">
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