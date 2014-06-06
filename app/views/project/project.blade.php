@extends('template.default')
@section('content')
<h3>{{ $data["project"]["name"]}}</h3>
<ul class="nav nav-tabs  nav-tabs-google" id="myTab">
    <li class="active"><a href="#issue" data-toggle="tab">Talepler</a></li>
    <li><a href="#summary" data-toggle="tab">Özet</a></li>
</ul>
<div class="tab-content">
    <div class="tab-pane active" id="issue">
        @if($data["issue"])
        <div class="col-xs-12 col-sm-12 ">
            <table class="table" style="margin-top: 10px">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Talep</th>
                    <th>Kime Atanmış</th>
                    <th>Bileşenler</th>
                    <th>Durumu</th>
                    <th>İşlemler</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data["issue"] as $issue)
                <tr>
                    <td>#{{$issue["id"]}}</td>
                    <td>{{$issue["title"]}}</td>
                    <td>Kime Atanmış</td>
                    <td>
                        @if(isset($issue["components_view"]))
                        @foreach ($issue["components_view"] as $components_v)
                        <span class="label label-default">{{$components_v["content"]}}</span>
                        @endforeach
                        @endif
                    </td>
                    <td>
                        @if($issue["status"] == 0)
                        <span class="label label-default">Açık</span>
                        @elseif($issue["status"] == 1)
                        <span class="label label-primary">İşlem Yapılıyor</span>
                        @else
                        <span class="label label-success">Tamamlandı</span>
                        @endif
                    </td>
                    <td>
                        {{ HTML::link(URL::route('issue',array('id' => $issue["id"])), Lang::get('general.viewed'), array('class' => 'btn btn-default btn-xs')) }}
                        @if(Auth::user()->id == $issue["creator"])
                        {{ HTML::link(URL::route('edit-issue',array('id' => $issue["id"])), Lang::get('general.edit'), array('class' => 'btn btn-primary btn-xs')) }}
                        @endif

                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @else
        <h5>{{ Lang::get('issue.no_issue') }}</h5>
        @endif
    </div>
    <div class="tab-pane" id="summary">
        <div class="col-xs-12 col-sm-12 ">
            <dl class="dl-horizontal">
                <dt>Versiyon</dt>
                <dd>
                    1.0
                </dd>
                <dt>Toplam Talep</dt>
                <dd>
                    <span class="text-danger"><b>{{ $data["issue_count"] }}</b></span>
                </dd>
                <dt>Bitirilen Talepler</dt>
                <dd>
                    <span class="text-info"><b>{{ $data["completed_issue_count"] }}</b></span>
                </dd>
                <dt>Açıklama</dt>
                <dd>
                    {{ $data["project"]["content"] }}
                </dd>
            </dl>
        </div>
    </div>
</div>
@stop