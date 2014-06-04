$(function(){

    // Tooltip
	$('[data-toggle=tooltip]').tooltip() 

    // Tablar için
	$('#myTab a').click(function (e) {
	  e.preventDefault()
	  $(this).tab('show')
	})

    // Global ajax
    $(document).ajaxStart(function () {
        $('body').prepend('<div class="loading"><div class="loading_content" style="position: absolute;left: 50%;top: 150px"><img src="../assets/img/ajax-loader.gif" alt="" style="position: relative;left: -50%"/></div></div>');
    });

    $(document).ajaxComplete(function () {
        $('.loading').remove();
    });


    // Menüde projeleri listelemek için
    $('#header_projects_menu').click(function(){
        $.ajax({
            type : "get",
            url: "/rufin/public/getProjectsList",
            dataType: 'json',
            beforeSend:function(){
                $('#projects').html(" ");
            },
            success: function(data){
                $.each(data, function(i) {
                    $('#projects').append("<li><a href='/rufin/public/project/"+data[i].id+"'>"+data[i].name+"</a></li>");
                })
            }
        })
    });

    $('#issue_work_button').click(function(){
        if($(this).attr('start') == 1){
            $(this).html('Çalışmayı Başlat');
            $(this).attr('start',0);
        }else{
            $(this).html('Çalışmayı Durdur');
            $(this).attr('start',1);
        }
    });
});