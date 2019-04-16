@extends('layouts.master')

@section('title', 'Add New Book')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">Add Book</h3>
                @include('layouts.messages')
                <form action="{{route('book.store')}}" method="post">
                    @csrf
                <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input class="form-control" type="text" name="name" placeholder="Enter Book name">
                        </div>
                    <div class="form-group">
                        <label class="control-label">Author</label>
                        <input class="form-control" type="text" name="author" placeholder="Enter Book Author">
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
