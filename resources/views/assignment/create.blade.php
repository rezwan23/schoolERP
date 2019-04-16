@extends('layouts.master')

@section('title', 'Add New Assignment')

@section('content')

    <div class="row">
        <div class="col-md-10">
            <div class="tile">
                <h3 class="tile-title">Add Assignment</h3>
                @include('layouts.messages')
                <form action="{{route('assignment.store')}}" method="post">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label">Title</label>
                            <input class="form-control" type="text" required name="title" placeholder="Enter Title">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Class</label>
                            <select name="class_id" id="" class="form-control">
                                @foreach($classes as $class)
                                    <option value="{{$class->id}}">{{$class->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Assignment</label>
                            <textarea id="content" name="assignment" cols="30" required rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Submit Date</label>
                            <input class="form-control" id="demoDate" type="text" required name="submit_date" placeholder="Enter Date">
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

@section('head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">

    <!-- Include Editor style. -->
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.5/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.5/css/froala_style.min.css" rel="stylesheet" type="text/css" />

@endsection


@section('footer')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>

    <!-- Include Editor JS files. -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@2.9.5/js/froala_editor.pkgd.min.js"></script>

    <!-- Initialize the editor. -->
    <script> $(function() { $('#content').froalaEditor() }); </script>

    <script src="{{asset('admin/js/plugins/bootstrap-datepicker.min.js')}}"></script>

    <script>
        $('#demoDate').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true,
            todayHighlight: true
        });
    </script>
@endsection


