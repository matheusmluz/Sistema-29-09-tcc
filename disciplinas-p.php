<?php ob_start();
	#valida sess�o
	require_once("validasessao.php");
	
	if($_SESSION[acessoUsuario] != "p"){
		header('Location: index.php?pag=erro.php');
	}

	//pega dados enviados por POST
	$codigoDisciplina	= $_POST['codigoDisciplina'];
	$nomeDisciplina		= $_POST['nomeDisciplina'];
	
	//inclui as classes
	include('classes/conexao.class.php');
	include('classes/disciplina.class.php');
	
	//instancia��o
	$conexao	= new Conexao();
	$disciplina	= new Disciplina($codigoDisciplina, $nomeDisciplina);
	
	//verifica opera��es e se h� codigo 
	if(isset($_GET['operacao'])){
		$operacao	= $_GET['operacao'];
	}
	
	if(isset($_GET['codigo'])){
		$codigo	= $_GET['codigo'];
	}
	
	//switch para determinar opera��o
	switch($operacao){
		case 0: #inclus�o
			if($disciplina->incluirDisciplina()){
				$msg	= "Cadastro efetivado!";
			} else {
				$msg	= "Erro de cadastro!";
			}
			
			echo "<script>";
			echo	"alert(\"$msg\");";
			echo	"location.href='areaAdm.php?pag=disciplinas-c.php';";
			echo "</script>";
			
			break;
			
		case 1: #consulta
			echo "<script>";
			echo	"location.href='areaAdm.php?pag=disciplinas-a.php&codigo=$codigo';";
			echo "</script>";
			break;
			
		case 2: #exclus�o
			if($disciplina->excluirDisciplina($codigo)){
				$msg	= "Registro exclu�do com sucesso!";
			} else {
				$msg	= "Registro n�o exclu�do!";
			}	
			
			echo "<script>";
			echo	"alert(\"$msg\");";
			echo	"location.href='areaAdm.php?pag=disciplinas-c.php';";
			echo "</script>";
			
			break;
			
		case 3: #altera��o
			if($disciplina->alterarDisciplina($codigo)){
				$msg	= "Registro alterado!";
			} else {
				$msg	= "Registro n�o alterado!";
			}
			
			echo "<script>";
			echo	"alert(\"$msg\");";
			echo	"location.href='areaAdm.php?pag=disciplinas-c.php';";
			echo "</script>";
			
			break;
	}
?>





















