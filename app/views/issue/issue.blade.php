@extends('template.default')
@section('content')
<h3>{{ $data["issue"]["title"]." <small>#".$data["issue"]["id"]."</small>"}}</h3>
<style>
    dt{
        font-size: 14px;
        text-align: left!important;
    }
    dd{
        font-size: 13px;
    }
    dl{
        margin-left: 5px;
    }
</style>
<dl class="dl-horizontal">
    <dt>{{ Form::label('', Lang::get('general.created_at')) }}</dt>
    <dd><p>{{$data["issue"]["created_at"]}}</p></dd>
    <dt>{{ Form::label('', Lang::get('project.components')) }}</dt>
    <dd><p>
        @if(isset($data["issue"]["components_view"]))
            @foreach ($data["issue"]["components_view"] as $components_v)
            <span class="label label-default">{{$components_v["content"]}}</span>
            @endforeach
        @endif
        </p>
    </dd>
    <dt>{{ Form::label('', Lang::get('general.content')) }}</dt>
    <dd><p>{{$data["issue"]["content"]}}</p></dd>
</dl>
@stop