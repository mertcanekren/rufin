@extends('template.default')
@section('content')
@include('settings.sidebar')
<script type="text/javascript">
    $(function(){
        $('.general').addClass('active');
    });
</script>
<div class="col-md-8">

    <h4>{{Lang::get('settings.general')." ".Lang::get('settings.settings')}}</h4>
    
    <form role="form">
    
      
    </form>

</div>

<div class="clear10"></div>
@stop