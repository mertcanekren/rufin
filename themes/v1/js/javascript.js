$(function(){
    $('.sidebar-list').click(function(){
        $('#submenu-'+ $(this).attr('sub-menu')).slideToggle();
    });
});