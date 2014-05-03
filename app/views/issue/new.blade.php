@extends('template.default')
@section('content')
<h4>{{Lang::get('project.new')}}</h4>
{{ Form::open(array('route' => 'new-issue', 'method' => 'POST')) }}
  <div class="form-group">
    {{ Form::label('', Lang::get('project.project')) }}
    {{ Form::select('project', array(
      'L' => 'Large', 
      'S' => 'Small'
    ), null, array('class' => 'form-control')) }}
  </div>
  <div class="form-group">
    {{ Form::label('', Lang::get('project.components')) }}
    {{ Form::select('project', array(
      'L' => 'Large', 
      'S' => 'Small'
    ), null, array('class' => 'form-control')) }}
  </div>
  <div class="form-group">
    {{ Form::label('', Lang::get('issue.name')) }}
    {{ Form::text('name', '', array('placeholder' => Lang::get('issue.name'), 'class' => 'form-control')); }}
  </div>
  <div class="form-group">
    {{ Form::label('', Lang::get('general.content')) }}
    {{ Form::textarea('content', '', array('placeholder' => Lang::get('issue.write_detail'), 'class' => 'form-control')) }}
  </div>
  <div class="form-group">
    {{ Form::label('', Lang::get('project.assigned_user')) }}
    {{ Form::select('project', array(
      '2' => 'user1', 
      '1' => 'user2'
    ), null, array('class' => 'form-control')) }}
  </div>
  <div class="form-group">
    {{Form::submit(Lang::get('general.submit'), array('class' => 'btn btn-default'))}}
  </div>
{{ Form::close() }}
@stop