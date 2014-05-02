@extends('template.default')
@section('content')
{{ Form::open(array('route' => 'new-issue', 'method' => 'POST', 'class' => 'form-horizontal')) }}
  <div class="form-group">
    {{ Form::label('', 'Proje') }}
    {{ Form::select('project', array(
      'L' => 'Large', 
      'S' => 'Small'
    ), null, array('class' => 'form-control')) }}
  </div>
  <div class="form-group">
    {{ Form::label('', 'Bileşenler') }}
    {{ Form::select('project', array(
      'L' => 'Large', 
      'S' => 'Small'
    ), null, array('class' => 'form-control')) }}
  </div>
  <div class="form-group">
    {{ Form::label('', 'Açıklama') }}
    {{ Form::textarea('content', '', array('placeholder' => 'Proje Detayını Yazın', 'class' => 'form-control')) }}
  </div>
  <div class="form-group">
    {{ Form::label('', 'Atanan') }}
    {{ Form::select('project', array(
      '2' => 'user1', 
      '1' => 'user2'
    ), null, array('class' => 'form-control')) }}
  </div>
  <div class="form-group">
      <button type="submit" class="btn btn-default">Kaydet</button>
  </div>
{{ Form::close() }}
@stop