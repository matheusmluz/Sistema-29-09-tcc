<?php ob_start();
	#valida sessão
	require_once("validasessao.php");
	
	if($_SESSION[acessoUsuario] != "p"){
		header('Location: index.php?pag=erro.php');
	}
?>

<html>
	<head>
		<title>Cadastro de disciplina</title>
		<?php include('includes/header.txt'); ?>
		<script type="text/javascript" src="js/validaDisciplina.js"></script>
	</head>
	
	<body>
		<h1>Cadastro de disciplina</h1>
		<hr />
		<form name = "formDisciplina" id = "formDisciplina" action = "disciplinas-p.php" method = "POST">
			<table>
				<tr>
					<td><label for = "nomeDisciplina">Nome da disciplina<span>*</span></label></td>
				</tr>
				<tr>
					<td><input type = "text" name = "nomeDisciplina" id = "nomeDisciplina" maxlength = "50" /></td>
				</tr>
				<tr>
					<td><input type = "submit" name = "enviar" id = "enviar" value = "Cadastrar" />
						<input type = "reset" name = "limpar" id = "limpar" value = "Limpar" />
					</td>
				</tr>
				<tr>
					<td colspan = "2">
						<div id = "mensagem"></div>
					</td>
				</tr>
			</table>
		</form>
	</body>

</html>