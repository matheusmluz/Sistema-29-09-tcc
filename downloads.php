<?php 
	$arquivo = $_GET["arquivo"]; 
	if(isset($arquivo) && file_exists($arquivo)){
			
		switch(strtolower(substr(strrchr(basename($arquivo),"."),1))){
			
			case "pdf": 
				$tipo="application/pdf"; 
				break;

			case "zip": 
				$tipo="application/zip"; 
				break;
		}

		
		if($tipo == "application/pdf"){
			header("Content-Type: ".$tipo); // informa o tipo do arquivo ao navegador
			header("Content-Length: ".filesize($arquivo)); // informa o tamanho do arquivo ao navegador
			readfile($arquivo); // l� o arquivo
			exit; // aborta p�s-a��es   
		} else {
		
			header("Content-Type: ".$tipo); // informa o tipo do arquivo ao navegador
			header("Content-Length: ".filesize($arquivo)); // informa o tamanho do arquivo ao navegador
			header("Content-Disposition: attachment; filename=".basename($arquivo)); // informa ao navegador que � tipo anexo e faz abrir a janela de download, tambem informa o nome do arquivo
			readfile($arquivo); // l� o arquivo
			exit; // aborta p�s-a��es   
		}
	}
?>