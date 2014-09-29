$(document).ready(function(){
	$.validator.addMethod("valueNotEquals", function(value, element, arg){
		return arg != value;
	});
			$('#formConteudo').validate({ 

				//regras e mensagens para os campos
				rules: {  
					codigoDisciplina:		{valueNotEquals: "0" },  
					//codigoMateria: 			{valueNotEquals: "0" },  
					arquivoConteudo: 			{valueNotEquals: "0" },  
					
				},  
				messages: {  
					codigoDisciplina: { 
						valueNotEquals: "<br />Selecione uma disciplina!" ,
					},
					
					/*codigoMateria: {
						valueNotEquals: "<br />Selecione uma mat&eacute;ria!",
					},*/
					
					nomeArquivo: {
						required: '<br />Informe o nome do arquivo!',
						minlength: '<br />M&iacute;nimo 5 d&iacute;gitos!',
					},
					
					arquivoConteudo: {
						valueNotEquals: "<br />Selecione uma disciplina!" ,
					},
				},
 
			});  
		});
		
//var atLeastOneIsChecked = $('#codigoDocumento :checkbox:checked').length > 0;