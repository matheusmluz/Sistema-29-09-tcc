$(document).ready(function(){

	$('#formMateria').validate({ 

		//regras e mensagens para os campos
		rules: {  
			nomeMateria: {required: true, minlength: 3 }  
		},  
		messages: {  
			nomeMateria: { 
				required: '<br />Campo obrigat&oacute;rio!', 
				minlength: '<br />M&iacute;nimo 3 d&iacute;gitos!', 
			},  
		},
	});  
});