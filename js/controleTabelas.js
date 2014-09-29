$(document).ready(function(){
	$(window).load(function(){
		
		if($(window).width() < 780){
			$('.controle').hide();
		} else {
			$('.controle').show();
		}
	});
});