@extends('template.default')
@section('content')

    <!--
    <div class="col-xs-12 col-sm-6 ">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title">Aktiviteler
            <span class="right" style="font-size:12px">Bu Gün <span class="badge">42</span></span>
          </h3>
        </div>

        <div class="list-group activity_row">
          <div class="media list-group-item activity_content">
            <a class="pull-left" href="#">
            <img src="../public/assets/img/profile.jpg" alt=""></a>
            <div class="media-body">
              <h5 class="media-heading"><a href="#">Username</a> yeni proje oluşturdu <a href="#">Test</a> <span class="label label-new-project">Proje</span></h5>
              <span class="activity_content_span">Proje yönetim sistemi oluşturulacak.</span>
              <div class="clear"></div>
              <span class="activity_content_time">05.04.2013 14:43</span>
            </div>
          </div>
        </div>


        <div class="list-group activity_row">
          <div class="media list-group-item activity_content">
            <a class="pull-left" href="#">
            <img src="../public/assets/img/profile.jpg" alt=""></a>
            <div class="media-body">
              <h5 class="media-heading"><a href="#">Username</a> yeni talep oluşturdu <a href="#">Test içerik eklenecek</a> <span class="label label-new-request">Talep</span></h5>
              <span class="activity_content_span">Test içerikler gerek.</span>
              <div class="clear"></div>
              <span class="activity_content_time">05.04.2013 14:43</span>
            </div>
          </div>
        </div>


      </div>
    </div>
    -->
    <div class="panel panel-warning">
        <div class="panel-heading">
          <h3 class="panel-title">Bana Atanan Talepler</h3>
        </div>
        <div class="panel-body">
            @if($data["issue"])
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{Lang::get('general.id')}}</th>
                        <th>{{Lang::get('general.issue')}}</th>
                        <th>{{Lang::get('issue.components')}}</th>
                        <th>{{Lang::get('general.actions')}}</th>
                        <th>{{Lang::get('general.created_at')}}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($data["issue"] as $issue)
                <a href="asd">
                <tr>
                    <td>#{{$issue["id"]}}</td>
                    <td>{{ HTML::link(URL::route('issue', array($issue["id"])), $issue["title"]) }}</td>
                    <td>
                        @if(isset($issue["components_view"]))
                            @foreach ($issue["components_view"] as $components_v)
                            <span class="label label-default">{{$components_v["content"]}}</span>
                            @endforeach
                        @endif
                    </td>
                    <td>
                        {{ HTML::link(URL::route('issue',array('id' => $issue["id"])), Lang::get('general.viewed'), array('class' => 'btn btn-default btn-xs')) }}
                    </td>
                    <td title="{{date('d.m.Y H:i',$issue["createtime"])}}">
                        {{date('d.m.Y',$issue["createtime"])}}
                    </td>
                </tr>
                </a>
                @endforeach
                </tbody>
            </table>
            @else
            <p>{{Lang::get('issue.no_issue')}}</p>
            @endif
        </div>
    </div>
  @stop