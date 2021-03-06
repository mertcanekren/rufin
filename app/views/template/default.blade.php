<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Rufin</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Web proje yönetim sistemi">
    {{ HTML::style('assets/bootstrap/css/bootstrap.css') }}
    {{ HTML::style('assets/todc-bootstrap/css/todc-bootstrap.css') }}
    {{ HTML::style('assets/css/custom.css') }}
    {{ HTML::style('assets/css/noboot.css') }}
    {{ HTML::script('assets/js/jquery.js') }}
    {{ HTML::script('assets/js/javascript.js') }}
    {{ HTML::script('assets/bootstrap/js/bootstrap.min.js') }}
</head> 
<body>
  <div class="navbar navbar-inverse navbar-static-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        {{ HTML::link(URL::route('home'), Lang::get('general.brand'), array('class' => 'navbar-brand')) }}
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li>{{ HTML::link(URL::route('dashboard'), Lang::get('general.dashboard')) }}</li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="header_projects_menu">
                {{ Lang::get('general.projects') }}
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu" id="projects">

            </ul>
          </li>
          <li>
          {{ HTML::link(URL::route('new-issue'), Lang::get('issue.new')) }}
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li>{{ HTML::link(URL::route('profile',array('id'  => Auth::user()->id)), Auth::user()->name) }}</li>
          @if(Auth::user()->role == "1")
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="glyphicon glyphicon-plus"></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
              <li>{{ HTML::link(URL::route('new-project'), Lang::get('project.new')) }}</li>
            </ul>
          </li>
          @endif
            
          <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="glyphicon glyphicon-wrench"></span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li>{{ HTML::link(URL::route('settings'), Lang::get('general.settings')) }}</li>
                <!--<li class="divider"></li>-->
            </ul>
          </li>
          
           <li data-toggle="tooltip" data-placement="bottom" title="Çıkış"><a href="{{ URL::route('logout') }}"><span class="glyphicon glyphicon-log-out"></span></a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="container">
    <!--
    <ol class="breadcrumb breadcrumb-sm">
      <li class="active"><a href="#">Pano</a></li>
    </ol>
    -->
    @yield('content')
  </div>
  <div class="clear"></div>
  <div id="footer">
    <div class="container">
      <p class="text-muted">&copy; 2014</p>
    </div>
  </div>
</body>
</html>