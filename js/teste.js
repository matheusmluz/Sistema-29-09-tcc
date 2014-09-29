$(document).ready(function(){
	$('#codigoDisciplina').load(function(){
		
		if($(window).width() < 780){
			$('.controle').hide();
		} else {
			$('.controle').show();
		}
	});
});