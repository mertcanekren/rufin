$(function(){
    $('.sidebar-list').click(function(){
        $('#submenu-'+ $(this).attr('sub-menu')).slideToggle();
    });

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

});