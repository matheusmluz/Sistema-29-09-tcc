<?php ob_start();

	#valida sessão
	require_once("validasessao.php");
	
	if($_SESSION[acessoUsuario] != "p"){
		header('Location: index.php?pag=erro.php');
	}

	//includes
	include('classes/conexao.class.php');
	include('classes/conteudo.class.php');
	
	//verifica se há $codigo na url
	if(isset($_GET['codigo'])){
		$codigo	= $_GET['codigo'];
	}
	
	//instanciação
	$conexao	= new Conexao();
	$conteudo	= new Conteudo($codigoConteudo, $codigoUsuario, $codigoDisciplina, $codigoMateria, $tituloConteudo, $dataConteudo, $arquivoConteudo);
	
	if($conteudo->buscarConteudo($codigo)) {
	
		#se existe o registro, povoa os atributos do obj
		$codigoConteudo		= $conteudo->getCodigoConteudo();
		$codigoUsuario		= $conteudo->getCodigoUsuario();
		$codigoDisciplina	= $conteudo->getCodigoDisciplina();
		$codigoMateria		= $conteudo->getCodigoMateria();
		$tituloConteudo		= $conteudo->getTituloConteudo();
		$dataConteudo		= $conteudo->getDataConteudo();
		$arquivoConteudo	= $conteudo->getArquivoConteudo();
		
		#metodos das FKs
		$resDisciplina 		= $conteudo->listarDisciplina();
		$resMateria 		= $conteudo->listarMateria();
		$loginUsuario		= $conteudo->buscarUsuario($codigoUsuario);
		
?>
		<script type="text/javascript" src="js/validaConteudo.js"></script>

		<h1>Altera&ccedil;&atilde;o de conte&uacute;do</h1>
		<hr />
		
		<form name = "formConteudo" id = "formConteudo" action = "conteudos-p.php?operacao=3&codigo=<?php echo $codigoConteudo; ?>" method = "POST" enctype="multipart/form-data">
			<table>
				<tr>
					<td><label for = "codigoUsuario">Autor</label></td>
				</tr>
				<tr>
					<td><input type = "text" disabled name = "codigoUsuario" id = "codigoUsuario" value = "<?php echo $loginUsuario; ?>" /></td>
				</tr>
				<tr>
					<td><label for = "codigoDisciplina">Disciplina<span>*</span></label></td>
				</tr>
				<tr>
					<td>
						<select name = "codigoDisciplina" id = "codigoDisciplina">
							<?php 
									while($arrayDisciplina = mysql_fetch_array($resDisciplina)){
										if($codigoDisciplina == $arrayDisciplina['codigoDisciplina']) {
							?>
											<option selected value = "<?php echo $arrayDisciplina['codigoDisciplina']; ?>"><?php echo $arrayDisciplina['nomeDisciplina']; ?></option>
							<?php		} else { ?>
											<option value = "<?php echo $arrayDisciplina['codigoDisciplina']; ?>"><?php echo $arrayDisciplina['nomeDisciplina']; ?></option>
							<?php	
										}
									}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td><label for = "codigoMateria">Mat&eacute;ria</label></td>
				</tr>
				<tr>
					<td>
						<select name = "codigoMateria" id = "codigoMateria">
							<option value = "0">Selecione</option>
							<?php 
									while($arrayMateria = mysql_fetch_array($resMateria)){
										if($codigoMateria == $arrayMateria['codigoMateria']) {
							?>
											<option selected value = "<?php echo $arrayMateria['codigoMateria']; ?>"><?php echo $arrayMateria['nomeMateria']; ?></option>
							<?php		} else { ?>
											<option value = "<?php echo $arrayMateria['codigoMateria']; ?>"><?php echo $arrayMateria['nomeMateria']; ?></option>
							<?php	
										}
									}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td><label for = "tituloConteudo">T&iacute;tulo<span>*</span></label></td>
				</tr>
				<tr>
					<td><input type = "text" name = "tituloConteudo" id = "tituloConteudo" value = "<?php echo $tituloConteudo?>"/></td>
				</tr>
				<tr>
					<td><label for = "dataConteudo">Data</label></td>
				</tr>
				<tr>
					<td><input type = "text" disabled name = "dataConteudo" id = "dataConteudo" value = "<?php echo $dataConteudo = implode("/",array_reverse(explode("-",$dataConteudo)));?>"/></td>
				</tr>
				<tr>
				<tr>
					<td>Arquivo atual</td>
				</tr>
				<tr>
					<td>
					<a href = "downloads.php?arquivo=<?php echo urlencode($arquivoConteudo) ?>" target="_blank"><?php echo basename($arquivoConteudo)  ?></a>
					</td>
				</tr>
				<tr>
					<td>Arquivo (apenas <span>.zip </span>e<span> .pdf</span>)</td>
				</tr>
				<tr>
					<td><input required type = "file" name = "arquivoConteudo" /></td>
				</tr>
				</tr>
				
				<tr>
					<td>
						<input type = "submit" name = "envia" id = "enviar" value = "Enviar"/>
						<a href = "areaAdm.php?pag=conteudos-c.php" title = "Consultar registros">
							<input type = "button" name = "envia" id = "enviar" value = "Voltar"/>
						</a>
					</td>
				</tr>
			</table>
		</form>
<?php
	} else {
		echo $codigo. " " . "bugou";
	}	?>