@extends('layouts.master')

@section('title', 'New Sms')

@section('content')
    <div class="row">
        <div class="col-md-6">
            @include('layouts.messages')
            <div class="tile">
                <h3 class="tile-title float-left">New Sms</h3>
                <h6 class="badge badge-primary float-right">Balance : {{decrypt($config->quantity)}}</h6>
                <div class="clearfix"></div>
                <form action="{{Route('sms.new')}}" method="post">
                    @csrf
                <div class="tile-body">
                    <div class="form-group">
                        <label for="to" class="control-label">to</label>
                        <input type="text" name="to" class="form-control" placeholder="Ex: 01XXXXXXXXX,01XXXXXXXXX">
                    </div>
                    <div class="form-group">
                        <label for="message" class="control-label">Message</label>
                        <textarea name="message" onkeyup="countChracter($(this))" id="messageDiv" cols="30" rows="3" name="message"class="form-control" placeholder="Enter message here"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" style="width:100px;" disabled id="characterDiv" value="0/160">
                    </div>
                </div>
                <div class="tile-footer">
                    <button class="btn btn-primary" type="submit">Send</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('footer')
<script>
    function countChracter(el){
        var value = el.val().length;
        var remaining = 160-value;
        if(remaining <= 0){
            remaining = 0
        }
        $('#characterDiv').val(remaining+'/160');
    }
</script>
@endsection