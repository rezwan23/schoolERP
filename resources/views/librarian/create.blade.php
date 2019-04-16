@extends('layouts.master')

@section('title', 'Add New Librarian')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Add Librarian</h3>
                @include('layouts.messages')
                <form action="{{route('librarian.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input class="form-control" type="text" name="name" placeholder="Enter full name">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input class="form-control" type="email" name="email" placeholder="Enter full name">
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
