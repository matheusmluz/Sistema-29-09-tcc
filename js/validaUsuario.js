$(document).ready(function(){

	$('#formUsuario').validate({ 

		//regras e mensagens para os campos
		rules: {  
			nomeUsuario: 				{required: true, minlength: 3 },  
			sobrenomeUsuario: 			{required: true, minlength: 3 },  
			loginUsuarioCadastro: 		{required: true, minlength: 5 },  
			senhaUsuarioCadastro: 		{required: true, minlength: 8 },  
			emailUsuario: 				{required: true, email: true }
		},  
		messages: {  
			nomeUsuario: { 
				required: '<br />Campo obrigat&oacute;rio!', 
				minlength: '<br />M&iacute;nimo 3 d&iacute;gitos!', 
			},
			sobrenomeUsuario: { 
				required: '<br />Campo obrigat&oacute;rio!', 
				minlength: '<br />M&iacute;nimo 3 d&iacute;gitos!', 
			},  
			loginUsuarioCadastro: { 
				required: '<br />Campo obrigat&oacute;rio!', 
				minlength: '<br />M&iacute;nimo 5 d&iacute;gitos!', 
			},  			
			senhaUsuarioCadastro: { 
				required: '<br />Campo obrigat&oacute;rio!', 
				minlength: '<br />M&iacute;nimo 8 d&iacute;gitos!', 
			}, 
			emailUsuario: { 
				required: '<br />Campo obrigat&oacute;rio!',
				email: '<br />E-mail inv&aacute;lido!',
			},  			
		},
	});  
});