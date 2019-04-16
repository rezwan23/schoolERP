@extends('layouts.master')

@section('title', 'Edit Student')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Edit Student</h3>
                @include('layouts.messages')
                <form action="{{route('student.update', $student)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input class="form-control" type="text" name="name" value="{{$student->name}}" placeholder="Enter full name">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Class</label>
                            <select name="class_id" class="form-control" id="">
                                @foreach($classes as $class)
                                    <option @if($student->class_id == $class->id) selected @endif value="{{$class->id}}">{{$class->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Roll</label>
                            <input class="form-control" name="roll" type="text" value="{{$student->roll}}" placeholder="Enter Roll" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Date of Birth</label>
                            <input class="form-control" name="dob" type="text" id="demoDate" value="{{$student->dob}}" placeholder="Enter DOB" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Permanent Address</label>
                            <textarea class="form-control" rows="4" name="permanent_address" placeholder="Enter your Permanent address">{{$student->permanent_address}}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Present Address</label>
                            <textarea class="form-control" rows="4" name="present_address" placeholder="Enter your Present address">{{$student->present_address}}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nationality</label>
                            <input class="form-control" type="text" name="nationality" value="{{$student->nationality}}" placeholder="Enter full name">
                        </div>
                        <div class="form-group">
                            <label class="control-label">NID</label>
                            <input class="form-control" type="text" name="nid_number" value="{{$student->nid_number}}" placeholder="Enter full name">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Gender</label>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" value="Male" @if($student->gender=='Male') checked @endif type="radio" name="gender">Male
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" value="Female" @if($student->gender=='Female') checked @endif type="radio" name="gender">Female
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