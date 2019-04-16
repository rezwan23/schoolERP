@extends('layouts.master')

@section('title', 'View Fee Record')


@section('content')
    <div class="tile">
    <div class="row">
        <div class="col-md-3">
            <a href="{{route('fee.create')}}" class="btn btn-primary btn-sm">Add Fee record</a>
        </div>
        <div class="col-md-3">
            <form action="">
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
                <button class="btn btn-primary btn-sm">Submit</button>
            </form>
        </div>
    </div>
        @if($details->count()>0)
            <div class="tile-body">
                <div class="card">
                    <h4 class="card-header">Month - {{request('month')}}</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Student</th>
                                    <th>Fee</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($details as $s)
                                <tr>
                                    <td>{{$s->student->name}}</td>
                                    <td>
                                        @if($s->paid) <span class="badge badge-success">Paid</span>
                                            @else
                                        <span class="badge badge-warning">Up Paid</span>
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