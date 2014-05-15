@extends('template.default')
@section('content')
{{ HTML::style('assets/js/bootstrap-tagsinput/bootstrap-tagsinput.css') }}
{{ HTML::script('assets/js/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}
<script>
    $('input').tagsinput({
        typeahead: {
            source: function(query) {
                return $.getJSON('citynames.json');
            }
        }
    });
</script>
<h4>{{Lang::get('issue.new')}}</h4>
{{ Form::open(array('route' => 'add-issue', 'method' => 'POST')) }}
  <div class="form-group">
    {{ Form::label('', Lang::get('project.project')) }}
      <select class="form-control" name="project">
          @foreach ($data["projects"] as $projects)
          <option value="{{$projects["id"]}}">{{$projects["name"]}}</option>
          @endforeach
      </select>
  </div>
  <div class="form-group">
    {{ Form::label('', Lang::get('project.components')) }}
    <input type="text" value="{{$data["components"]}}" data-role="tagsinput" class="form-control" name="components"/>
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