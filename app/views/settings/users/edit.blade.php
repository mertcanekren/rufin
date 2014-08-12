@extends('template.default')
@section('content')
@include('settings.sidebar')
<script type="text/javascript">
    $(function(){
        $('.users').addClass('active');
    });
</script> 
<div class="col-md-8">
    <h4>{{Lang::get('settings.user')." ".Lang::get('settings.list')}}</h4>
    {{ Form::open(array('route' => 'add-issue', 'method' => 'POST')) }}
        <div class="form-group">
            {{ Form::label('', Lang::get('user.username')) }}
            {{ Form::text('username', $data["username"], array('placeholder' => Lang::get('user.username'), 'class' => 'form-control')); }}
        </div>
        
        <div class="form-group">
            {{ Form::label('', Lang::get('user.name')) }}
            {{ Form::text('name', $data["name"], array('placeholder' => Lang::get('user.name'), 'class' => 'form-control')); }}
        </div>
        
        <div class="form-group">
            {{ Form::label('', Lang::get('user.email')) }}
            {{ Form::text('email', $data["email"], array('placeholder' => Lang::get('user.email'), 'class' => 'form-control')); }}
        </div>
        
        <div class="checkbox">
            @if($data["role"] == "1")
                {{ Form::checkbox('role', 1, true) }} {{Lang::get('user.admin')}} 
            @else
                {{ Form::checkbox('role', 1, false) }} {{Lang::get('user.admin')}} 
            @endif
        </div>
        
        <div class="checkbox">
            @if($data["status"] == "1")
                {{ Form::checkbox('status', 1, true) }} {{Lang::get('user.status')}} 
            @else
                {{ Form::checkbox('status', 1, false) }} {{Lang::get('user.status')}} 
            @endif
        </div>
        <button type="submit" class="btn btn-default">{{Lang::get('general.submit')}}</button>
    {{ Form::close() }}
</div>
<div class="clear10"></div>
@stop