$(document).ready(function(){

	/*$("input[name=tipoConteudo]").click(function(){
		if($("input[name=tipoConteudo]").val() == 1) {
		
			$('.curiosidade').css('display','block');
		
		} else if($("input[name=tipoConteudo]").val() == 2){
			$('.curiosidade').css('display','none');
		}
	
	});*/
	
	$("input[name=tipoConteudo]").eq(1).click(function(){
		if($("input[name=tipoConteudo]").eq(1).val() == 2) {
		
			$('.curiosidade').hide();
		
		}
		
		
	});
	
	$("input[name=tipoConteudo]").eq(0).click(function(){
		if($("input[name=tipoConteudo]").eq(0).val() == 1) {
		
			$('.curiosidade').show();
		
		}
	});
	
});