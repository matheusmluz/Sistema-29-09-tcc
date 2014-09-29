<?php ob_start();


	$codigoUsuario		= "";
	$nomeUsuario		= $_POST['nomeUsuario'];
	$sobrenomeUsuario	= $_POST['sobrenomeUsuario'];
	$loginUsuario		= addslashes(htmlentities($_POST['loginUsuarioCadastro']));
	$senhaUsuario		= addslashes(htmlentities($_POST['senhaUsuarioCadastro']));
	$emailUsuario		= $_POST['emailUsuario'];
	$acessoUsuario		= "n";
	
	#includes
	include('classes/conexao.class.php');
	include('classes/usuario.class.php');
	
	#instanciação
	$conexao	= new Conexao();
	$usuario	= new Usuario($codigoUsuario, $nomeUsuario, $sobrenomeUsuario, $loginUsuario, $senhaUsuario, $emailUsuario, $acessoUsuario);
	
	#verifica $operacao e $codigo
	if(isset($_GET['operacao'])){
		$operacao	= $_GET['operacao'];
	}
	
	if(isset($_GET['codigo'])){
		$codigo		= $_GET['codigo'];
	}
	
	#switch
	switch($operacao){
		case 0: #inclusão
			if($usuario->incluirUsuario()){
				$msg	= "Cadastro efetivado!";
			} else {
				$msg	= "Erro de cadastro!";
			}
			
			echo "<script>";
			echo	"alert(\"$msg\");";
			echo	"location.href='index.php'";
			echo "</script>";
			
			break;
		
		case 1: #consulta
			break;
		
		case 2: #exclusao
			if($usuario->excluirUsuario($codigo)){
				$msg	= "Registro excluído";
				#$usuario->deslogarUsuario();
			} else {
				$msg	= "Registro não excluído!";
			}

			echo "<script>";
			echo	"alert(\"$msg\");";
			echo	"location.href='index.php';";
			echo "</script>";
			
			break;
			
		case 3: #alteração
			if($usuario->alterarUsuario($codigo)){

				$msg	= "Registro alterado!";
			} else {
				$msg	= "Registro não alterado!";
			}
			session_start();
			if($_SESSION[acessoUsuario] == "p"){
				echo "<script>";
				echo	"alert(\"$msg\");";
				echo	"location.href='areaAdm.php';";
				echo "</script>";
			} else {
				echo "<script>";
				echo	"alert(\"$msg\");";
				echo	"location.href='principal.php';";
				echo "</script>";
			}
			break;
	}
	
	
?>