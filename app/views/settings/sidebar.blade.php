<div class="col-md-3">
    <div class="list-group settings_sidebar">
      {{ HTML::link(URL::route('settings'), Lang::get('settings.general')." ".Lang::get('settings.settings'),array('class'=>'list-group-item general')) }}
      {{ HTML::link("#users", Lang::get('settings.user')." ".Lang::get('settings.settings'),array('class'=>'list-group-item users','data-toggle' => 'collapse')) }}
        <div class="list">
            <div class="collapse" id="users">
                {{ HTML::link(URL::route('settings-users-list'), Lang::get('settings.user')." ".Lang::get('settings.list'),array('class'=>'list-group-item')) }}
            </div>
        </div>
      {{ HTML::link(URL::route('settings-general'), Lang::get('settings.project')." ".Lang::get('settings.settings'),array('class'=>'list-group-item')) }}
    </div>
</div>