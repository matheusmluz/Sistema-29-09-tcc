$(document).ready(function(){
	
	$('#btnLogin').click(function(){
		$('#contDesktop').hide();
		$('#loginMobile').slideToggle('fast');
	});

	$(window).load(function(){
		
		if($(window).width() > 960){
			$('#contDesktop').show();
		}
	});
	
});