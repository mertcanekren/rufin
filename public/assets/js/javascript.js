$(function(){


	$('[data-toggle=tooltip]').tooltip() 

	$('#myTab a').click(function (e) {
	  e.preventDefault()
	  $(this).tab('show')
	})


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