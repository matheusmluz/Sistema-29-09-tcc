$(document).ready(function(){

	$('#formDisciplina').validate({ 

		//regras e mensagens para os campos
		rules: {  
			nomeDisciplina: {required: true, minlength: 3 }  
		},  
		messages: {  
			nomeDisciplina: { 
				required: '<br />Campo obrigat&oacute;rio!', 
				minlength: '<br />M&iacute;nimo 3 d&iacute;gitos!', 
			},  
		},
	});  
});