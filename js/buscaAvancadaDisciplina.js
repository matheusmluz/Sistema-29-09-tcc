$(document).ready(function(){
	$("#codigoDisciplina").change(function(){
		document.getElementById('info').innerHTML = "";
		var codigoDisciplina = this.value;
		
		retornarDados();
		
	});

});

function retornarDados() {
	
	if(codigoDisciplina.value == 0){
			codigoDisciplina.value 	= null;
	}
	
	$.ajax({
		
		url: "buscaAvancadaDisciplina.php",
		
		data: "codigoDisciplina="+codigoDisciplina.value,
		
		type: "GET",

		success: function (data) {
				
			document.getElementById('info').innerHTML += data;
	
		}
	});				
	
}