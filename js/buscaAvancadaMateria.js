$(document).ready(function(){
	
	var codigoDisciplina = document.getElementById(codigoDisciplina);
	if(codigoDisciplina != 0){
		console.log(codigoDisciplina);
	} else {
		console.log("oi");
	}
	$("#codigoMateria").change(function(){
		document.getElementById('info').innerHTML = "";
		var codigoMateria = this.value;
		
		retornarDadosMateria();
		
	});
});

function retornarDadosMateria() {
	
	if(codigoMateria.value == 0){
			codigoMateria.value 	= null;
	}
	
	$.ajax({
		
		url: "buscaAvancadaMateria.php",
		
		data: "codigoMateria="+codigoMateria.value,
		
		type: "GET",

		success: function (data) {
				
			document.getElementById('info').innerHTML += data;
	
		}
	});				
	
}