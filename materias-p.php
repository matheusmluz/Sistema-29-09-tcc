<?php ob_start();
	#valida sess�o
	require_once("validasessao.php");
	
	if($_SESSION[acessoUsuario] != "p"){
		header('Location: index.php?pag=erro.php');
	}

	
	#pega dados enviados por POST
	$codigoMateria	= $_POST['codigoMateria'];
	$nomeMateria	= $_POST['nomeMateria'];
	
	#includes
	include('classes/conexao.class.php');
	include('classes/materia.class.php');
	
	#instancia��o
	$conexao	= new Conexao();
	$materia	= new Materia($codigoMateria, $nomeMateria);
	
	#verifica se h� $operacao e $codigo
	if(isset($_GET['operacao'])){
		$operacao	= $_GET['operacao'];
	}
	
	if(isset($_GET['codigo'])){
		$codigo		= $_GET['codigo'];
	}
	
	#switch de $operacao
	switch($operacao){
		case 0: #inclus�o
			if($materia->incluirMateria()){
				$msg	= "Cadastro efetivado!";
			} else {
				$msg	= "Erro no cadastro!";
			}
			
			echo "<script>";
			echo	"alert(\"$msg\");";
			echo	"location.href='areaAdm.php?pag=materias-c.php';";
			echo "</script>";
			
			break;
			
		case 1: #consulta
			echo "<script>";
			echo	"location.href='areaAdm.php?pag=materias-a.php&codigo=$codigo';";
			echo "</script>";
			
			break;
			
		case 2: #exclus�o
				if($materia->excluirMateria($codigo)){
					$msg	= "Registro exclu�do com sucesso!";
				} else {
					$msg	= "Registro n�o exclu�do!";
				}
			echo "<script>";
			echo	"alert(\"$msg\");";
			echo	"location.href='areaAdm.php?pag=materias-c.php';";
			echo "</script>";
			
			break;
			
		case 3: #altera��o
			if($materia->alterarMateria($codigo)){
				$msg	= "Registro alterado!";
			} else {
				$msg	= "Registro n�o alterado!";
			}
			
			echo "<script>";
			echo	"alert(\"$msg\");";
			echo	"location.href='areaAdm.php?pag=materias-c.php';";
			echo "</script>";
			
			break;
	
	}
?>