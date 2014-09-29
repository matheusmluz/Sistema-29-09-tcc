$(document).ready(function(){
	$('#scrollMobile').css('display','none');
	
	$('#menuMobile').click(function(){
		$('#scrollMobile').slideDown('fast');
	});	

	$('.fechar').click(function(){
		$('#scrollMobile').slideUp('fast');
	});
});
