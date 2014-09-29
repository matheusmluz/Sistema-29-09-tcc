<?php ob_start();
	#valida sessão
	require_once("validasessao.php");
	
	if($_SESSION[acessoUsuario] != "p"){
		
		header('Location: principal.php?pag=erro.php');
	}
?>

<html>
	<head>
		<title>Cadastro de mat&eacute;ia</title>
		<?php include('includes/header.txt'); ?>
		<script type='text/javascript' src='js/validaMateria.js'></script>
	</head>
	<body>
		<h1>Cadastro de mat&eacute;ria</h1>
		<hr />
		<form name = "formMateria" id = "formMateria" action = "materias-p.php" method = "POST">
			<table>
				<tr>
					<td><label for = "nomeMateria">Nome da mat&eacute;ria<span>*</span></label></td>
				</tr>
				<tr>
					<td><input type = "text" name = "nomeMateria" id = "nomeMateria" maxlength = "50"/></td>
				</tr>
				<tr>
					<td><input type = "submit" name = "enviar" id = "enviar" value = "Cadastrar" />
						<input type = "reset" name = "limpar" id = "limpar" value = "Limpar" />
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>