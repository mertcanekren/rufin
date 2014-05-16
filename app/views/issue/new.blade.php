@extends('template.default')
@section('content')
<h4>{{Lang::get('issue.new')}}</h4>
{{ Form::open(array('route' => 'add-issue', 'method' => 'POST')) }}
  <div class="form-group">
    {{ Form::label('', Lang::get('project.project')) }}
      <select class="form-control" name="project">
          <option>{{ Lang::get('general.select') }}</option>
          @foreach ($data["projects"] as $projects)
          <option value="{{$projects["id"]}}">{{$projects["name"]}}</option>
          @endforeach
      </select>
  </div>
  <div class="form-group">
    {{ Form::label('', Lang::get('project.components')) }}
    @foreach ($data["components"] as $components)
    <label class="checkbox-inline">
        <input type="checkbox" value="{{$components["id"]}}"> {{$components["content"]}}
    </label>
    @endforeach
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