@extends('layouts.master')

@section('title', 'Set Permission')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Set Permission - Role : <span class="badge badge-primary">{{$role->name}}</span></h3>
                <div class="tile-body">
                    <form action="{{route('set-permission', $role)}}" method="post">
                        @csrf
                    @foreach($permissions as $permission)
                        <div class="animated-checkbox">
                            <label>
                                <input
                                        @foreach($role->permissions as $p)
                                                @if($p->id == $permission->id)
                                                    checked
                                                    @break
                                                @endif
                                            @endforeach
                                        type="checkbox" name="permission_id[]" value="{{$permission->id}}"><span class="label-text">{{$permission->name}}</span>
                            </label>
                        </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary">Set Permission</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
