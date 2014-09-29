<?php 

	#valida sessão
	require_once("validasessao.php");
	
	if($_SESSION[acessoUsuario] == "n"){
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
		$tituloConteudo		= $conteudo->gettituloConteudo();
		$dataConteudo		= $conteudo->getDataConteudo();
		$arquivoConteudo	= $conteudo->getArquivoConteudo();
		
		#metodos das FKs
		$resDisciplina 		= $conteudo->listarDisciplina();
		$resMateria 		= $conteudo->listarMateria();
		$loginUsuario		= $conteudo->buscarUsuario($codigoUsuario);
		
?>

		<h1><?php echo $tituloConteudo; ?></h1>
		<hr />
		
		<table cellspacing = "0" cellpadding = "5px">
			<tr>
				<td><p class = "destaque">Autor:</p></td>
				<td><p><?php echo $loginUsuario; ?></p></td>
			</tr>
			<tr>
				<td><p class = "destaque">Disciplina:</p></td>
				<td>
						<?php 
								while($arrayDisciplina = mysql_fetch_array($resDisciplina)){
									if($codigoDisciplina == $arrayDisciplina['codigoDisciplina']) {
						?>
										<p><?php echo $arrayDisciplina['nomeDisciplina']; ?></p>
						<?php		}
								}
						?>
				</td>
			</tr>
			<tr>
				<td><p class = "destaque">Mat&eacute;ria:</p></td>
				<td>
						<?php 
								while($arrayMateria = mysql_fetch_array($resMateria)){
									if($codigoMateria == $arrayMateria['codigoMateria']) {
						?>
										<p><?php echo $arrayMateria['nomeMateria']; ?></p>
						<?php		}
								}
						?>
				</td>
			</tr>
			<tr>
				<td><p class = "destaque">Arquivo:</p></td>
				<td><a href = "downloads.php?arquivo=<?php echo urlencode($arquivoConteudo) ?>" target="_blank"><?php echo basename($arquivoConteudo)  ?></a></td>
			</tr>
			<tr>
				<td><p class = "destaque">Data:</p></td>
				<td><p><?php echo $dataConteudo = implode("/",array_reverse(explode("-",$dataConteudo)));?></p></td>
			</tr>
			<tr>
				<td>
					<a href = "principal.php?pag=conteudos-c.php" title = "Voltar">
						<input type = "button" name = "envia" id = "enviar" value = "Voltar"/>
					</a>
				</td>
			</tr>
		</table>
<?php
	} else {
		echo $codigo. " " . "bugou";
	}	?>