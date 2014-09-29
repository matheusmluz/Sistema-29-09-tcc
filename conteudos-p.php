<?php ob_start();
	date_default_timezone_set('UTC');
	#valida sessão
	require_once("validasessao.php");
	
	if($_SESSION[acessoUsuario] == "a"){
		header('Location: index.php?pag=erro.php');
	}
	
	#pega dados por POST
	$codigoConteudo		= $_POST['codigoConteudo'];
	$codigoUsuario		= $_SESSION[codigoUsuario];
	$codigoDisciplina	= $_POST['codigoDisciplina'];
	$codigoMateria		= $_POST['codigoMateria'];	
	$tituloConteudo		= $_POST['tituloConteudo'];
	$dataConteudo		= date("y/m/d");
	

	
	#teste função troca caracter
	function especiais($texto) {
		$especiais 	= array('à','á','â','ã','ä','å','ç','è','é','ê','ë','ì','í','î','ï','não','ò','ó','ô','õ','ö','ù','ü','ú','ÿ','À','Á','Â','Ã','Ä','Å','Ç','È','É','Ê','Ë','Ì','Í','Î','Ï','Ñ','Ò','Ó','Ô','Õ','Ö','O','Ù','Ü','Ú','Ÿ',' ');
		$simples	= array('a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','y','A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N','O','O','O','O','O','O','U','U','U','Y', '');
		
		return $nome = str_replace($especiais, $simples,$texto);
	}
	
	$_FILES['arquivoConteudo']['name'] = especiais($_FILES['arquivoConteudo']['name']);

	
	#dados do upload
	$nome			= $_FILES['arquivoConteudo']['name'];
	$tipo			= $_FILES["arquivoConteudo"]["type"];
	$tamanho 		= $_FILES["arquivoConteudo"]["size"];
	$nomeTemporario = $_FILES["arquivoConteudo"]["tmp_name"];
	
	#includes
	include('classes/conexao.class.php');
	include('classes/conteudo.class.php');
	include('classes/upload.class.php');
	
	#instanciação
	$conexao	= new Conexao();
	$upload		= new Upload($nome , $tamanho , $nomeTemporario , $tipo);
	
	#verifica se há $operacao e $codigo	
	if(isset($_GET['operacao'])){
		$operacao	= $_GET['operacao'];
	}
	
	if(isset($_GET['codigo'])){
		$codigo		= $_GET['codigo'];
	}
	
	#switch
	switch($operacao){
		case 0: #inclusao
		
			#tenta upar o arquivo e atribui o retorno a $arquivoConteudo
			if($arquivoConteudo = $upload->upar($nome , $tamanho , $nomeTemporario , $tipo)){
			
				#se upou, instancia um conteudo e tenta incluir no banco
				$conteudo	= new Conteudo($codigoConteudo, $codigoUsuario, $codigoDisciplina, $codigoMateria, $tituloConteudo, $dataConteudo, $arquivoConteudo);
				
				if($conteudo->incluirConteudo()){
					$msg	= "Cadastro efetivado!";
				} else {
					$msg	= "Erro de cadastro!";
				}
				
			} else {
				$msg = "erro de up";
			}
			
			echo "<script>";
			echo	"alert(\"$msg\");";
			echo	"location.href='areaAdm.php?pag=conteudos-c.php';";
			echo "</script>";
			
			break;			
			
		case 1: #consulta
			echo "<script>";
			echo	"location.href='areaAdm.php?pag=conteudos-a.php&codigo=$codigo';";
			echo "</script>";
			
			break;
			
		case 2: #exclusao
			$conteudo	= new Conteudo($codigoConteudo, $codigoUsuario, $codigoDisciplina, $codigoMateria, $tituloConteudo, $dataConteudo, $arquivoConteudo);
			
			if($upload->excluirArquivo($codigo)){
				if($conteudo->excluirConteudo($codigo)){
					
					
					$msg	= "Registro excluído com sucesso!";
					
				} else {
					$msg	= "Registro não excluído!";
				}
			}
			
			echo "<script>";
			echo	"alert(\"$msg\");";
			echo	"location.href='areaAdm.php?pag=conteudos-c.php';";
			echo "</script>";
			
			break;
			
		case 3: #alteração
			
			#exclui arquivo existente
			$upload->excluirArquivo($codigo);
			
			#testa se upou o novo arquivo
			if($arquivoConteudo = $upload->upar($nome , $tamanho , $nomeTemporario , $tipo)){
			
				#instanciação 
				$conteudo	= new Conteudo($codigoConteudo, $codigoUsuario, $codigoDisciplina, $codigoMateria, $tituloConteudo, $dataConteudo, $arquivoConteudo);
				
				#verifica se alterou
				if($conteudo->alterarConteudo($codigo)){
					$msg	= "Registro alterado!";
				} else {
					$msg	= "Registro não alterado!";
				}
			}
			
			echo "<script>";
			echo	"alert(\"$msg\");";
			echo	"location.href='areaAdm.php?pag=conteudos-c.php';";
			echo "</script>";
			
			break;
	}
?>