@extends('template.default')
@section('content')
<h4>{{Lang::get('project.new')}}</h4>
{{ Form::open(array('route' => 'new-project', 'method' => 'POST')) }}
  <div class="form-group">
    {{ Form::label('', Lang::get('project.name')) }}
    {{ Form::text('name', '', array('placeholder' => Lang::get('project.name'), 'class' => 'form-control')); }}
  </div>
  <div class="form-group">
    {{ Form::label('', Lang::get('general.content')) }}
    {{ Form::textarea('content', '', array('placeholder' => Lang::get('project.write_detail'), 'class' => 'form-control')) }}
  </div>
  <div class="form-group">
	{{Form::submit(Lang::get('general.submit'), array('class' => 'btn btn-default'))}}
  </div>
{{ Form::close() }}
@stop