@extends('user.master')

@section('content')


    <section class="welcome_about">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h2>What we are</h2>
                    {!! $about->about !!}
                </div>
                <div class="col-md-5">
                    <img src="/user/images/welcome-img.jpg" class="img-fluid" alt="#">
                </div>
            </div>
        </div>
    </section>

@endsection