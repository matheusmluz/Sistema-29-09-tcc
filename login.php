<?php

	#pega dados por POST
	$loginUsuario	= addslashes(htmlentities($_POST['loginUsuario']));
	$senhaUsuario	= addslashes(htmlentities($_POST['senhaUsuario']));
	
	#includes
	include('classes/conexao.class.php');
	include('classes/usuario.class.php');
	
	#instanciação
	$conexao	= new Conexao();
	$usuario	= new Usuario($loginUsuario, $senhaUsuario,0,0,0,0,0);
	
	#chamada
	$usuario->validarUsuario($loginUsuario, md5($senhaUsuario));
	
?>