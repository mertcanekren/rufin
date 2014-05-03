@extends('template.default')
@section('content')
<h4>Yeni Proje Ekle</h4>
{{ Form::open(array('route' => 'new-project', 'method' => 'POST')) }}
  <div class="form-group">
    {{ Form::label('', 'Proje Adı') }}
    {{ Form::text('name', '', array('placeholder' => 'Proje Adı', 'class' => 'form-control')); }}
  </div>
  <div class="form-group">
    {{ Form::label('', 'Açıklama') }}
    {{ Form::textarea('content', '', array('placeholder' => 'Proje Detayını Yazın', 'class' => 'form-control')) }}
  </div>
  <div class="form-group">
      <button type="submit" class="btn btn-default">Kaydet</button>
  </div>
{{ Form::close() }}
@stop