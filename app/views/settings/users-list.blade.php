@extends('template.default')
@section('content')
@include('settings.sidebar')
<script type="text/javascript">
    $(function(){
        $('.users').addClass('active');
    });
</script>
<div class="col-md-8">
    <h4>{{Lang::get('settings.user')." ".Lang::get('settings.list')}}</h4>
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Kullanıcı Adı</th>
                <th>E-mail</th>
                <th>Kayıt Zamanı</th>
                <th>İşlemler</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($data as $user)
            <tr>
                <td>{{$user["id"]}}</td>
                <td>{{$user["username"]}}</td>
                <td>{{$user["email"]}}</td>
                <td>{{date('d.m.Y H:i',$user["createtime"])}}</td>
                <td></td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="clear10"></div>
@stop