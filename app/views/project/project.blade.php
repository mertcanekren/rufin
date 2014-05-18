@extends('template.default')
@section('content')
<h3>{{ $data["project"]["name"]}}</h3>
<ul class="nav nav-tabs  nav-tabs-google" id="myTab">
    <li class="active"><a href="#summary" data-toggle="tab">Özet</a></li>
    <li><a href="#issue" data-toggle="tab">Talepler</a></li>
</ul>
<div class="tab-content">
    <div class="tab-pane active" id="summary">
        <div class="col-xs-12 col-sm-12 ">
            <dl class="dl-horizontal">
                <dt>Versiyon</dt>
                <dd>
                    1.0
                </dd>
                <dt>Key</dt>
                <dd>
                    TES
                </dd>
                <dt>Toplam Talep</dt>
                <dd>
                    <span class="text-danger"><b>{{ $data["issue_count"] }}</b></span>
                </dd>
                <dt>Bitirilen Talepler</dt>
                <dd>
                    <span class="text-info"><b>3</b></span>
                </dd>
                <dt>Açıklama</dt>
                <dd>
                    {{ $data["project"]["content"] }}
                </dd>
            </dl>
        </div>
    </div>
    <div class="tab-pane" id="issue">
        @if($data["issue"])
        <div class="col-xs-12 col-sm-12 ">
            <div class="panel-group" id="accordion" style="margin-top: 10px">
                <?php @$a = 0 ?>
                @foreach ($data["issue"] as $issue)
                <?php $a ++ ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$a}}">
                                {{$issue["title"]}} #{{$a}}
                            </a>
                        </h4>
                    </div>
                    <div id="collapse{{$a}}" class="panel-collapse collapse out">
                        <div class="panel-body">
                            @if(isset($issue["components_view"]))
                                @foreach ($issue["components_view"] as $components_v)
                                <span class="label label-default">{{$components_v["content"]}}</span>
                                @endforeach
                            @endif
                            <div class="clear"></div>
                            <br/>
                            <p>{{$issue["content"]}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @else
            <h5>{{ Lang::get('issue.no_issue') }}</h5>
        @endif
    </div>
</div>
@stop