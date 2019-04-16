@extends('layouts.master')

@section('title', 'Enter Attendance Record')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title float-left">Add Attendance Record</h3>
                <a href="{{route('attendance.index')}}" class="btn btn-primary btn-sm float-right">View Record</a>
                <div class="clearfix"></div>
                    <div class="tile-body">
                        @csrf
                        <form action="">
                        <div class="row">
                            @include('layouts.messages')

                            <div class="col-md-3">
                                <label for="month">Select Class</label>
                                <select name="class_id" id="" class="form-control">
                                    @foreach($classes as $class)
                                        <option value="{{$class->id}}">{{$class->name}}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                            </div>

                        </div>
                        </form>
                        @if($students->count()>0)
                            <form action="{{route('attendance.store')}}" method="post" onsubmit="return confirm('Are You Sure?')">
                                @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="date">Select Date</label>
                                    <input type="text" class="form-control" id="demoDate" autocomplete="off" value="{{date('Y-m-d')}}" name="date">
                                    <input type="hidden" value="{{request('class_id')}}" name="class_id">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Student</th>
                                            <th>Roll</th>
                                            <th>Present</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($students as $student)
                                            <tr>
                                                <td>
                                                    {{$student->name}}
                                                    <input type="hidden" value="{{$student->id}}" name="student_id[{{$loop->index}}][]">
                                                </td>
                                                <td>
                                                    {{$student->roll}}
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <label class="control-label">Present</label>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="radio" value="1" name="present[{{$loop->index}}][]">Present
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="radio" value="0" checked name="present[{{$loop->index}}][]">Absent
                                                            </label>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tile-footer">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>
                            </div>
                            </form>
                        @endif
                    </div>
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