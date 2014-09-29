<?php ob_start();
	session_start();
	
	if((!isset($_SESSION[codigoUsuario])) AND(!isset($_SESSION[loginUsuario])) AND (!isset($_SESSION[senhaUsuario])) AND (!isset($_SESSION[acessoUsuario]))) {
		header('Location: index.php?pag=erro.php');
	}
	

?>