<?php ob_start();
	
	#valida sessão
	require_once("validasessao.php");
	
	if($_SESSION[acessoUsuario] != "p"){
		header('Location: index.php?pag=erro.php');
	}

	#includes
	include('classes/conexao.class.php');
	include('classes/solicitacao.class.php');
	
	#instanciação
	$conexao		= new Conexao();
	$solicitacao	= new Solicitacao();
	
	#verifica se tem $operacao e $codigo
	if(isset($_GET['operacao'])){
		$operacao	= $_GET['operacao'];
	}
	
	if(isset($_GET['codigo'])){
		$codigo		= $_GET['codigo'];
	}
	
	#switch de $operacao
	switch($operacao){
		case 1: #aceitar
			if($solicitacao->aceitarUsuario($codigo)){
				$msg	= "Aluno aceito!";
			} else {
				$msg	= "Erro";
			}
			
			echo "<script>";
			echo	"alert(\"$msg\");";
			echo	"location.href='areaAdm.php?pag=solicitacoes-c.php';";
			echo "</script>";
			
			break;
			
		case 2: #recusar
			if($solicitacao->recusarUsuario($codigo)){
				$msg	= "Aluno excluído!";
			} else {
				$msg	= "Erro";
			}
			
			echo "<script>";
			echo	"alert(\"$msg\");";
			echo	"location.href='areaAdm.php?pag=solicitacoes-c.php';";
			echo "</script>";
			
			break;
			
		case 3: #tornar professor
			if($solicitacao->mudarUsuario($codigo)){
				$msg	= "Aluno se tornou professor!";
			} else {
				$msg	= "Erro";
			}
			
			echo "<script>";
			echo	"alert(\"$msg\");";
			echo	"location.href='areaAdm.php?pag=solicitacoes-c.php';";
			echo "</script>";
			
			break;
			break;
	}

?>