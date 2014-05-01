$(function(){


	$('[data-toggle=tooltip]').tooltip() 

	$('#myTab a').click(function (e) {
	  e.preventDefault()
	  $(this).tab('show')
	})

});