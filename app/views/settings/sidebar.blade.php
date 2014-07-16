<div class="col-md-3">
    <div class="list-group">
      {{ HTML::link(URL::route('settings-general'), Lang::get('settings.general')." ".Lang::get('settings.settings'),array('class'=>'list-group-item active')) }}
      {{ HTML::link(URL::route('settings-general'), Lang::get('settings.user')." ".Lang::get('settings.settings'),array('class'=>'list-group-item')) }}
      {{ HTML::link(URL::route('settings-general'), Lang::get('settings.project')." ".Lang::get('settings.settings'),array('class'=>'list-group-item')) }}
    </div>
</div>