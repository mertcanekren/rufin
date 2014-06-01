@extends('template.default')
@section('content')
<h3>{{ $data["issue"]["title"]." <small>#".$data["issue"]["id"]."</small>"}}</h3>
<hr/>
<style>
    dt{
        font-size: 13px;
        text-align: left!important;
    }
    dd{
        font-size: 13px;
    }
    dl{
        margin-left: 5px;
    }
</style>
<div class="btn-group">
    @if(Auth::user()->id == $data["issue"]["creator"])
        {{ HTML::link(URL::route('edit-issue',array('id' => $data["issue"]["id"])), Lang::get('general.edit'),array('type' => 'button', 'class' => 'btn btn-primary')) }}
    @endif
    @if(Auth::user()->id == $data["issue"]["users"])
        <button type="button" class="btn btn-default" id="issue_work_button" start="0">{{Lang::get('issue.start_work')}}</button>
    @endif
</div>
<h3 class="page-header">Detaylar</h3>
<dl class="dl-horizontal">
    <dt>{{ Form::label('', Lang::get('project.reporter_user')) }}</dt>
    <dd><p>{{ HTML::link(URL::route('profile',array('id'  => $data["reporter"]["id"])), $data["reporter"]["username"]) }}</p></dd>
    <dt>{{ Form::label('', Lang::get('project.assigned_user')) }}</dt>
    <dd><p>{{ HTML::link(URL::route('profile',array('id'  => $data["users"]["id"])), $data["users"]["username"]) }}</p></dd>
    <dt>{{ Form::label('', Lang::get('general.created_at')) }}</dt>
    <dd><p title="{{date('d.m.Y H:i',$data["issue"]["createtime"])}}">{{date('d.m.Y',$data["issue"]["createtime"])}}</p></dd>
    <dt>{{ Form::label('', Lang::get('general.status')) }}</dt>
    <dd><p>{{$data["issue"]["status_v"]}}</p></dd>
    <dt>{{ Form::label('', Lang::get('project.components')) }}</dt>
    <dd><p>{{$data["issue"]["component_view"]["content"]}}</p></dd>
    <dt>{{ Form::label('', Lang::get('issue.type')) }}</dt>
    <dd><p>{{$data["issue"]["type_view"]["content"]}}</p></dd>
    <dt>{{ Form::label('', Lang::get('project.labels')) }}</dt>
    <dd><p>
        @if(isset($data["issue"]["labels_view"]))
            @foreach ($data["issue"]["labels_view"] as $labels_v)
            <span class="label label-default">{{$labels_v["content"]}}</span>
            @endforeach
        @endif
        </p>
    </dd>
</dl>
<h3 class="page-header">{{Lang::get('general.content')}}</h3>
<p>{{$data["issue"]["content"]}}</p>
@stop