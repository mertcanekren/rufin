@extends('template.default')
@section('content')
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
            <img src="../assets/img/profile.jpg" alt=""></a>
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
            <img src="../assets/img/profile.jpg" alt=""></a>
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
    <div class="col-xs-12 col-sm-6">
      <div class="panel panel-warning">
        <div class="panel-heading">
          <h3 class="panel-title">Bana Atanan Talepler</h3>
        </div>
        <div class="list-group">
          <a href="#" class="list-group-item">
            Cras justo odio
          </a>
          <a href="#" class="list-group-item">Dapibus ac facilisis in</a>
          <a href="#" class="list-group-item">Morbi leo risus</a>
          <a href="#" class="list-group-item">Porta ac consectetur ac</a>
          <a href="#" class="list-group-item">Vestibulum at eros</a>
        </div>
      </div>
    </div>
  </div>
  @stop