<?php ob_start();

	#includes
	include('classes/conexao.class.php');
	include('classes/usuario.class.php');
	
	#instanciação
	$conexao	= new Conexao();
	$usuario	= new Usuario($codigoUsuario, $nomeUsuario, $sobrenomeUsuario, $loginUsuario, $senhaUsuario, $emailUsuario, $acessoUsuario);
	
	#chamada de método deslogar
	$usuario->deslogarUsuario();
?>