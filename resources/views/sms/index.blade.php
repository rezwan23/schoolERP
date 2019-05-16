@extends('layouts.master')

@section('title', 'SMS History')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <h3 class="tile-title">SMS History</h3>
            <div class="tile-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td>#</td>
                        <td>To</td>
                        <td>Message</td>
                        <td>MessageID</td>
                        <td>Status</td>
                        <td>Errors</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($smss as $sms)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$sms->to}}</td>
                            <td>{{$sms->message}}</td>
                            <td>{{$sms->message_id}}</td>
                            <td>{{$sms->status}}</td>
                            <td>@foreach(json_decode($sms->error) as $error) {{$error}} @endforeach</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection