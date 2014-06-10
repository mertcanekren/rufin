@extends('template.default')
@section('content')
<h4>{{Lang::get('project.edit')}}</h4>
@if ($errors->count() > 0)
  <div class="alert alert-danger">
      <ul>
      @foreach ($errors->all() as $msg)
      <li>{{ $msg }}</li>
      @endforeach
      </ul>
  </div>
@endif
@if(@$_GET["succes"] == "1")
<div class="alert alert-success">
    <ul>
        <li>{{Lang::get('general.success-edit')}}</li>
    </ul>
</div>
@endif
{{ Form::open(array('route' => 'editing-project', 'method' => 'POST')) }}
  <div class="form-group">
    {{ Form::label('', Lang::get('project.name')) }}
    {{ Form::text('name', $data["project"]["name"], array('placeholder' => Lang::get('project.name'), 'class' => 'form-control')); }}
  </div>
  <div class="form-group">
    {{ Form::label('', Lang::get('general.content')) }}
    {{ Form::textarea('content', $data["project"]["content"], array('placeholder' => Lang::get('project.write_detail'), 'class' => 'form-control')) }}
  </div>
  <div class="form-group">
	{{Form::submit(Lang::get('general.submit'), array('class' => 'btn btn-default'))}}
  </div>
  {{ Form::hidden('rowid', $data["project"]["id"]); }}
{{ Form::close() }}
@stop