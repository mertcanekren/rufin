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
                <th>{{Lang::get('user.username')}}</th>
                <th>{{Lang::get('user.email')}}</th>
                <th>{{Lang::get('user.createtime')}}</th>
                <th width="110">{{Lang::get('general.actions')}}</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($data as $user)
            <tr>
                <td>{{$user["id"]}}</td>
                <td>{{$user["username"]}}</td>
                <td>{{$user["email"]}}</td>
                <td>{{date('d.m.Y H:i',$user["createtime"])}}</td>
                <td>
                    {{ HTML::link(URL::route('settings-users-edit',array('id' => $user["id"])), Lang::get('general.edit'), array('class' => 'btn btn-primary btn-xs')) }}           
                    {{ HTML::link(URL::route('settings-users-delete',array('id' => $user["id"])), Lang::get('general.delete'), array('class' => 'btn btn-danger btn-xs')) }}           
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="clear10"></div>
@stop