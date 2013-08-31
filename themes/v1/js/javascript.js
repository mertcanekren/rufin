$(function(){


    $('.sidebar-list').click(function(){
        $('#submenu-'+ $(this).attr('sub-menu')).slideToggle();
    });

    $('.new-diary').click(function(){
    	$('.new-diary-button').hide();
    	$('.new-diary-form').fadeIn();
    });

    $('#form-cancel').click(function(){
    	var formid = $(this).attr('rel');
    	$('#'+formid).fadeOut();
    	if(formid == "home-new-diary-form"){
    		$('.new-diary').fadeOut();
    	}
    });
});