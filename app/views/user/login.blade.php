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
	{{ HTML::script('assets/js/jquery.js') }}
	{{ HTML::script('assets/js/javascript.js') }}
	{{ HTML::script('assets/bootstrap/js/bootstrap.min.js') }}
</head> 
<body>
  <div class="navbar navbar-default navbar-masthead navbar-static-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Rufin</a>
      </div>
    </div>
  </div>
  <div class="container" style="margin-top:50px">
    <div class="col-md-4 col-md-offset-4">
        @if ($errors->count() > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $msg)
                <li>{{ $msg }}</li>
                @endforeach
            </ul>
        </div>
        @endif
      <div class="panel panel-success">
        <div class="panel-heading">
          <h3 class="panel-title"><strong>Giriş</strong></h3>
        </div>
        <div class="panel-body">
        {{ Form::open(array('route' => 'signin', 'method' => 'POST')) }}
          <div class="form-group">
              {{ Form::label('', Lang::get('user.username')) }}
              {{ Form::text('email', '', array('placeholder' => Lang::get('user.username'), 'class' => 'form-control')); }}
          </div>
          <div class="form-group">
              {{ Form::label('', Lang::get('user.password')) }}
              {{ Form::password('password', array('class' => 'form-control','placeholder' => Lang::get('user.password'))); }}
          </div>
          <button type="submit" class="btn btn-sm btn-default">Giriş</button>
        {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
  <div id="footer">
    <div class="container">
      <p class="text-muted">&copy; 2014</p>
    </div>
  </div>
</body>
</html>