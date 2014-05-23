@extends('template.default')
@section('content')
{{ HTML::style('assets/css/plugin/bootstrap-tags/bootstrap-tags.css') }}
{{ HTML::script('assets/js/plugin/bootstrap-tags/bootstrap-tags.js') }}
<script>
    $(function(){
        $("#components").tags({
            tagSize: "sm",
            suggestions: [@foreach ($data["components"] as $components) "{{$components["content"]}}",@endforeach ],
            tagData: [],
            caseInsensitive: true
        });



    });
</script>
<h4>{{Lang::get('issue.new')}}</h4>
@if ($errors->count() > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $msg)
        <li>{{ $msg }}</li>
        @endforeach
    </ul>
</div>
@endif
{{ Form::open(array('route' => 'add-issue', 'method' => 'POST')) }}
  <div class="form-group">
    {{ Form::label('', Lang::get('project.project')) }}
      <select class="form-control" name="project">
          <option value="">{{ Lang::get('general.select') }}</option>
          @foreach ($data["projects"] as $projects)
          <option value="{{$projects["id"]}}">{{$projects["name"]}}</option>
          @endforeach
      </select>
  </div>
  <div class="form-group">
    {{ Form::label('', Lang::get('project.components')) }}
    <div id="components"></div>
  </div>
  <div class="form-group">
    {{ Form::label('', Lang::get('issue.title')) }}
    {{ Form::text('title', '', array('placeholder' => Lang::get('issue.title'), 'class' => 'form-control')); }}
  </div>
  <div class="form-group">
    {{ Form::label('', Lang::get('general.content')) }}
    {{ Form::textarea('content', '', array('placeholder' => Lang::get('issue.write_detail'), 'class' => 'form-control')) }}
  </div>
  <div class="form-group">
    {{ Form::label('', Lang::get('project.assigned_user')) }}
      <select class="form-control" name="users">
          <option value="">{{ Lang::get('general.select') }}</option>
          @foreach ($data["users"] as $users)
          <option value="{{$users["id"]}}">{{$users["name"]}}</option>
          @endforeach
      </select>
  </div>
  <div class="form-group">
    {{Form::submit(Lang::get('general.submit'), array('class' => 'btn btn-default'))}}
  </div>
{{ Form::close() }}
@stop