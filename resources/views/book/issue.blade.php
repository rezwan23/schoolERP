@extends('layouts.master')

@section('title', 'Issue Book')

@section('content')
    <div class="row">
        <div class="col-md-6">
            @include('layouts.messages')
            <div class="tile">
                <h3 class="tile-title">Vertical Form</h3>
                <form action="{{route('book.issue')}}" method="post">
                    @csrf
                <div class="tile-body">
                    <div class="form-group">
                        <label class="control-label">Student</label>
                        <select name="student_id" required class="form-control" id="demoSelect">
                            @foreach($students as $student)
                            <option value="{{$student->id}}">{{$student->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Book</label>
                        <select name="book_id" required class="form-control" id="demoSelect1">
                            @foreach($books as $book)
                                <option value="{{$book->id}}">{{$book->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="tile-footer">
                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Issue</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script src="{{asset('admin/js/plugins/select2.min.js')}}"></script>
    <script>
        $('#demoSelect').select2();
        $('#demoSelect1').select2();
    </script>
@endsection