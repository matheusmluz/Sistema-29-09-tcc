<?php ob_start();
	#valida sessão
	require_once("validasessao.php");
	
	if($_SESSION[acessoUsuario] == "a"){
		header('Location: index.php?pag=erro.php');
	}
	
	#includes
	include('classes/conexao.class.php');
	include('classes/conteudo.class.php');
	
	#instanciação
	$conexao	= new Conexao();
	$conteudo	= new Conteudo($codigoConteudo, $codigoUsuario, $codigoDisciplina, $codigoMateria, $tituloConteudo, $dataConteudo, $arquivoConteudo);
	
	if(!$resDisciplina = $conteudo->listarDisciplina()){
		echo "<p class = \"center\">Cadastre uma disciplina!</p>";
		
		
	} else {
		date_default_timezone_set('UTC');
		$dataConteudo = date("d/m/y");
?>

<html>
	<head>
		<title>Cadastro de conte&uacute;do</title>
		<?php include('includes/header.txt'); ?>
		<script type="text/javascript" src="js/validaConteudo.js"></script>
	</head>
	
	<body>
		<h1>Cadastro de conte&uacute;do</h1>
		<hr />
		<form name = "formConteudo" id = "formConteudo" action = "conteudos-p.php" method = "POST" enctype="multipart/form-data">
			<table>
				<tr>
					<td><label for = "codigoUsuario">Autor</label></td>
				</tr>
				<tr>
					<td><input type = "text" disabled name = "codigoUsuario" id = "codigoUsuario" value = "<?php echo $_SESSION[loginUsuario]; ?>" /></td>
				</tr>
				<tr>
					<td><label for = "codigoDisciplina">Disciplina<span>*</span></label></td>
				</tr>
				<tr>
					<td>
						<select name = "codigoDisciplina" id = "codigoDisciplina">
							<option value = "0">Selecione</option>
							<?php 
								while($array = mysql_fetch_array($resDisciplina)){
							?>
									<option value = "<?php echo $array['codigoDisciplina']; ?>"><?php echo $array['nomeDisciplina']; ?></option>
							<?php	
								}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td><label for = "codigoMateria">Mat&eacute;ria</label></td>
				</tr>
				<tr class = "curiosidade">
					<td>
						<select name = "codigoMateria" id = "codigoMateria">
							<option value = "0">Selecione</option>
							<?php 
								while($array = mysql_fetch_array($resMateria)){
							?>
									<option value = "<?php echo $array['codigoMateria']; ?>"><?php echo $array['nomeMateria']; ?></option>
							<?php	
								}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td><label for = "tituloConteudo">T&iacute;tulo<span>*</span></label></td>
				</tr>
				<tr>
					<td><input type = "text" name = "tituloConteudo" id = "tituloConteudo" maxlength = "50"/></td>
				</tr>
				<tr>
					<td><label for = "dataConteudo">Data</label></td>
				</tr>
				<tr>
					<td><input type = "text" disabled name = "dataConteudo" id = "dataConteudo" value = "<?php echo $dataConteudo; ?>"/></td>
				</tr>
				<tr>
					<td><label for = "arquivoConteudo">Arquivo (apenas <span>.zip </span>e<span> .pdf</span>)<span>*</span></label></td>
				</tr>	
				<tr>
					<td><input required type = "file" name = "arquivoConteudo" /></td>
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

<?php } ?>