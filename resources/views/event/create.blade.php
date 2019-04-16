@extends('layouts.master')

@section('title', 'New Event')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="tile">
                <h3 class="tile-title">Create New Event</h3>
                @include('layouts.messages')
                <form action="{{route('event.store')}}" method="post">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input class="form-control" required type="text" name="name" placeholder="Enter event name">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Date</label>
                            <input class="form-control" required type="text" name="date" id="demoDate" placeholder="Enter event date">
                        </div>
                        <div class="form-group" id="desc">
                            <label class="control-label">Description</label>
                            <textarea name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Link</label>
                            <input class="form-control" required type="text" name="link" value="#" placeholder="Enter event link">
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
    <script> $(function() { $('textarea').froalaEditor() }); </script>

    <script src="{{asset('admin/js/plugins/bootstrap-datepicker.min.js')}}"></script>

    <script>
        $('#demoDate').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true,
            todayHighlight: true
        });
    </script>
@endsection
