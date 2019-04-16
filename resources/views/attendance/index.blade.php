@extends('layouts.master')

@section('title', 'View Fee Record')


@section('content')
    <div class="tile">
    <div class="row">
        <div class="col-md-3">
            <a href="{{route('attendance.create')}}" class="btn btn-primary btn-sm">Add Attendance record</a>
        </div>
        <div class="col-md-3">
            <form action="">
                <label for="month">Select Class</label>
                <select name="class_id" id="" class="form-control">
                    @foreach($classes as $class)
                        <option value="{{$class->id}}">{{$class->name}}</option>
                    @endforeach
                </select>
                <label for="month">Date</label>
                <input type="text" autocomplete="off" id="demoDate" class="form-control" name="date">
                <button class="btn btn-primary btn-sm">Submit</button>
            </form>
        </div>
    </div>
        @if($attendance->count()>0)
            <div class="tile-body">
                <div class="card">
                    <h4 class="card-header">Class - {{$classes->where('id', request('class_id'))->first()->name}} Date - {{request('date')}}</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Student</th>
                                    <th>Attendance</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($attendance as $s)
                                <tr>
                                    <td>{{$s->student->name}}</td>
                                    <td>
                                        @if($s->present) <span class="badge badge-success">Present</span>
                                            @else
                                        <span class="badge badge-warning">Absent</span>
                                            @endif
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
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