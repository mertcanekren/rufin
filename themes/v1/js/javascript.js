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

	/*
	 $('input[type="text"],input[type="password"]').poshytip({
		className: 'tip-twitter',
		showTimeout: 1,
		alignTo: 'target',
		alignX: 'center',
		offsetY: 5,
		allowTipHover: true,
		fade: false,
		slide: false
	});
	*/


});