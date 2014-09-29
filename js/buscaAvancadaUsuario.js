$(document).ready(function(){
	
	var codigoUsuario = document.getElementById(codigoUsuario);
	if(codigoUsuario != 0){
		console.log(codigoUsuario);
	} else {
		console.log("oi");
	}
	$("#codigoUsuario").change(function(){
		document.getElementById('info').innerHTML = "";
		var codigoUsuario = this.value;
		
		retornarDadosUsuario();
		
	});
});

function retornarDadosUsuario() {
	
	if(codigoUsuario.value == 0){
			codigoUsuario.value 	= null;
	}
	
	$.ajax({
		
		url: "buscaAvancadaUsuario.php",
		
		data: "codigoUsuario="+codigoUsuario.value,
		
		type: "GET",

		success: function (data) {
				
			document.getElementById('info').innerHTML += data;
	
		}
	});				
	
}