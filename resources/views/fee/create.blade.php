@extends('layouts.master')

@section('title', 'Enter Fee Record')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title float-left">Add Fee Record</h3>
                <a href="{{route('fee.index')}}" class="btn btn-primary btn-sm float-right">View Record</a>
                <div class="clearfix"></div>
                <form action="{{route('fee.store')}}" method="post" onsubmit="return confirm('Are You Sure?')">
                    <div class="tile-body">
                        @csrf
                        <div class="row">
                            <div class="col-md-3">
                                <label for="month">Select Month</label>
                                <select name="month" id="" class="form-control">
                                    <option value="january">January</option>
                                    <option value="february">February</option>
                                    <option value="march">March</option>
                                    <option value="april">April</option>
                                    <option value="may">May</option>
                                    <option value="june">June</option>
                                    <option value="july">July</option>
                                    <option value="august">August</option>
                                    <option value="september">September</option>
                                    <option value="october">October</option>
                                    <option value="november">November</option>
                                    <option value="december">December</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Student</th>
                                        <th>Paid</th>
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
                                            <div class="form-group">
                                                <label class="control-label">Fee</label>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" value="1" name="paid[{{$loop->index}}][]">Paid
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" value="0" checked name="paid[{{$loop->index}}][]">Unpaid
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
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection