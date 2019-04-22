@extends('layouts.master')

@section('title', 'Add New Student')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Add Student</h3>
                @include('layouts.messages')
                <form action="{{route('student.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input class="form-control" type="text" name="name" placeholder="Enter full name">
                        </div>
                    <div class="form-group">
                        <label class="control-label">Class</label>
                        <select name="class_id" class="form-control" id="">
                            @foreach($classes as $class)
                                <option value="{{$class->id}}">{{$class->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Roll</label>
                        <input class="form-control" type="text" name="roll" placeholder="Enter student roll">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <input class="form-control" type="email" name="email" placeholder="Enter full name">
                    </div>
                        <div class="form-group">
                            <label class="control-label">Date of Birth</label>
                            <input class="form-control" name="dob" type="text" id="demoDate" placeholder="Enter DOB" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Permanent Address</label>
                            <textarea class="form-control" rows="4" name="permanent_address" placeholder="Enter your Permanent address"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Present Address</label>
                            <textarea class="form-control" rows="4" name="present_address" placeholder="Enter your Present address"></textarea>
                        </div>
                    <div class="form-group">
                        <label class="control-label">Nationality</label>
                        <input class="form-control" type="text" name="nationality" placeholder="Enter full name">
                    </div>
                    <div class="form-group">
                        <label class="control-label">NID</label>
                        <input class="form-control" type="text" name="nid_number" placeholder="Enter full name">
                    </div>
                        <div class="form-group">
                            <label class="control-label">Gender</label>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" value="Male" type="radio" name="gender">Male
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" value="Female" type="radio" name="gender">Female
                                </label>
                            </div>
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

@section('footer')

    <script src="{{asset('admin/js/plugins/bootstrap-datepicker.min.js')}}"></script>

    <script>
        $('#demoDate').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true,
            todayHighlight: true
        });
    </script>
    @endsection