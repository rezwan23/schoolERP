@extends('user.master')

@section('content')

    <section class="clearfix about">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Welcome</h2>
                </div>
            </div>
        </div>
    </section>
    <section class="our-teachers">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mb-5">Teachers</h2>
                </div>
            </div>
            <div class="row">
                @foreach($teachers as $teacher)
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="admission_insruction">
                        <img src="/uploads/{{$teacher->photo}}" width="255px" height="300px" class="img-fluidd" alt="#">
                        <p class="text-center mt-3"><span>{{$teacher->name}}</span></p>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section>

    <section class="our-teachers">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mb-5">Students</h2>
                </div>
            </div>
            <div class="row">
                @foreach($students as $student)
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="admission_insruction">
                            <img src="/uploads/{{$student->photo}}" width="255px" height="300px" class="img-fluidd" alt="#">
                            <p class="text-center mt-3"><span>{{$student->name}}</span></p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>



@endsection