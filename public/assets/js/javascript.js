$(function(){

    // Tooltip
	$('[data-toggle=tooltip]').tooltip() 

    // Tablar için
	$('#myTab a').click(function(e){
	  e.preventDefault()
	  $(this).tab('show')
	})

    // Global ajax
    $(document).ajaxStart(function () {
        $('body').prepend('<div class="loading"><div class="loading_content" style="position: absolute;left: 50%;top: 150px"><img src="/rufin/public/assets/img/ajax-loader.gif" alt="" style="position: relative;left: -50%"/></div></div>');
    });

    $(document).ajaxComplete(function () {
        $('.loading').remove();
    });

    // Menüde projeleri listelemek için
    $('#header_projects_menu').click(function(){
        var comp = $(this).attr('completed');
        if (typeof comp == 'undefined') {
            $.ajax({
                type : "get",
                url: "/rufin/public/getProjectsList",
                dataType: 'json',
                beforeSend:function(){
                    $('#projects').html(" ");
                },
                success: function(data){
                    $('#header_projects_menu').attr('completed','ok');
                    $.each(data, function(i) {
                        $('#projects').append("<li><a href='/rufin/public/project/"+data[i].id+"'>"+data[i].name+"</a></li>");
                    })
                }
            })
        }
    });

    // Talep ekranında çalışma butonu için
    $('#issue_work_button').click(function(){
        var start = $(this).attr('start');
        if (typeof attr != 'undefined' && $(this).attr('start') == 1) {
            $.ajax({
                type : "post",
                url: "/rufin/public/workIssue",
                data:{
                    id: $(this).data('id'),
                    status : 0
                },
                success: function(){
                    $('#issue_work_button').html('Çalışmayı Başlat');
                    $('#issue_work_button').attr('start',0);
                    $('#issue_status').html('Açık');
                    $('#close_issue').hide();
                }
            })
        }else{
            $.ajax({
                type : "post",
                url: "/rufin/public/workIssue",
                data:{
                    id: $(this).data('id'),
                    status : 2
                },
                success: function(){
                    $('#issue_work_button').html('Çalışmayı Durdur');
                    $('#issue_work_button').attr('start',1);
                    $('#issue_status').html('İşlem Yapılıyor');
                    $('#close_issue').show();
                }
            })
            
        }
    });
    
    // Talep kapatma
    $('#close_issue').click(function(){
        $.ajax({
            type : "post",
            url: "/rufin/public/workIssue",
            data:{
                id: $(this).data('id'),
                status : 1
            },
            success: function(){
                $('#issue_work_button').html('Tamamlandı');
                $('#issue_work_button').addClass('btn-success');
                $('#issue_work_button').removeAttr('start');
                $('#issue_work_button').removeAttr('data-id');
                $('#issue_work_button').removeAttr('id');
                $('#issue_status').html('Tamamlandı');
                $('#close_issue').hide();
            }
        })
    });
});