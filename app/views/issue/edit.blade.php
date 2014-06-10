@extends('template.default')
@section('content')
{{ HTML::style('assets/css/plugin/bootstrap-tags/bootstrap-tags.css') }}
{{ HTML::script('assets/js/plugin/bootstrap-tags/bootstrap-tags.js') }}
<script>
    $(function(){
        $("#labels").tags({
            tagSize: "sm",
            suggestions: [@foreach ($data["labels"] as $labels) "{{$labels["content"]}}",@endforeach ],
            tagData: [@foreach ($data["issue"]["labels_view"] as $lbv) "{{$lbv["content"]}}",@endforeach ],
            caseInsensitive: true
        });
    });
</script>
<h4>{{Lang::get('issue.edit')}}</h4>
@if(@$_GET["succes"] == "1")
<div class="alert alert-success">
    <ul>
        <li>{{Lang::get('general.success-edit')}}</li>
    </ul>
</div>
@endif
@if ($errors->count() > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $msg)
        <li>{{ $msg }}</li>
        @endforeach
    </ul>
</div>
@endif
{{ Form::open(array('route' => 'editing-issue', 'method' => 'POST')) }}
<div class="form-group">
    {{ Form::label('', Lang::get('project.project')) }}
    <select class="form-control" name="project">
        <option value="">{{ Lang::get('general.select') }}</option>
        @foreach ($data["projects"] as $projects)
            @if($projects["id"] == $data["issue"]["project_id"])
                <option selected value="{{$projects["id"]}}">{{$projects["name"]}}</option>
            @else 
                <option value="{{$projects["id"]}}">{{$projects["name"]}}</option>
            @endif
        @endforeach
    </select>
</div>
<div class="form-group">
    {{ Form::label('', Lang::get('issue.title')) }}
    {{ Form::text('title', $data["issue"]["title"], array('placeholder' => Lang::get('issue.title'), 'class' => 'form-control')); }}
</div>
<div class="form-group">
    {{ Form::label('', Lang::get('general.content')) }}
    {{ Form::textarea('content', $data["issue"]["content"], array('placeholder' => Lang::get('issue.write_detail'), 'class' => 'form-control')) }}
</div>
<div class="form-group">
    {{ Form::label('', Lang::get('issue.type')) }}
    <select class="form-control" name="type">
        <option value="">{{ Lang::get('general.select') }}</option>
        @foreach ($data["type"] as $type)
            @if($type["id"] == $data["issue"]["type"])
            <option selected value="{{$type["id"]}}">{{$type["content"]}}</option>
            @else
            <option value="{{$type["id"]}}">{{$type["content"]}}</option>
            @endif
        @endforeach
    </select>
</div>
<div class="form-group">
    {{ Form::label('', Lang::get('issue.components')) }}
    <select class="form-control" name="components">
        <option value="">{{ Lang::get('general.select') }}</option>
        @foreach ($data["components"] as $components)
            @if($components["id"] == $data["issue"]["components"])
                <option selected value="{{$components["id"]}}">{{$components["content"]}}</option>
            @else
                <option value="{{$components["id"]}}">{{$components["content"]}}</option>
            @endif
        @endforeach
    </select>
</div>
<div class="form-group">
    {{ Form::label('', Lang::get('issue.labels')) }}
    <div id="labels"></div>
</div>
<div class="form-group">
    {{ Form::label('', Lang::get('issue.assigned_user')) }}
    <select class="form-control" name="users">
        <option value="{{Auth::user()->id}}">{{ Auth::user()->name." ".Lang::get('issue.select_myself') }}</option>
        @foreach ($data["users"] as $users)
            @if($users["id"] == $data["issue"]["users"])
                <option selected value="{{$users["id"]}}">{{$users["name"]}}</option>
            @else
                <option value="{{$users["id"]}}">{{$users["name"]}}</option>
            @endif
        @endforeach
    </select>
</div>
<div class="form-group">
    {{Form::submit(Lang::get('general.submit'), array('class' => 'btn btn-default'))}}
</div>
{{ Form::hidden('rowid', $data["issue"]["id"]); }}
{{ Form::close() }}
@stop