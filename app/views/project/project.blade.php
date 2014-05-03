@extends('template.default')
@section('content')
	<h3>{{$project->name}} <small>Proje yönetim sistemi</small></h3>
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
			  		<span class="text-danger"><b>15</b></span>
				</dd>
				<dt>Bitirilen Talepler</dt>
			  	<dd>
			  		<span class="text-info"><b>3</b></span>
				</dd>
				<dt>Açıklama</dt>
			  	<dd>
			  		{{$project->tab-content}}
				</dd>
			</dl>
	 	</div>
	  </div>
	  <div class="tab-pane" id="issue">
		<div class="col-xs-12 col-sm-12 ">
			<div class="panel-group" id="accordion">
			  <div class="panel panel-default">
			    <div class="panel-heading">
			      <h4 class="panel-title">
			        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
			          Collapsible Group Item #1
			        </a>
			      </h4>
			    </div>
			    <div id="collapseOne" class="panel-collapse collapse in">
			      <div class="panel-body">
			        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
			      </div>
			    </div>
			  </div>
			  <div class="panel panel-default">
			    <div class="panel-heading">
			      <h4 class="panel-title">
			        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
			          Collapsible Group Item #2
			        </a>
			      </h4>
			    </div>
			    <div id="collapseTwo" class="panel-collapse collapse">
			      <div class="panel-body">
			        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
			      </div>
			    </div>
			  </div>

			</div>
		</div>
	  </div>
	</div>
@stop