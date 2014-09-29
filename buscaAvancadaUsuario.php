<?php
	$codigoUsuario	= $_GET['codigoUsuario'];
	
	#valida sessão
	require_once("validasessao.php");
	
	if($_SESSION[acessoUsuario] == "n"){
		header('Location: index.php?pag=erro.php');
	}

	//includes
	include('classes/conexao.class.php');
	include('classes/conteudo.class.php');

	//instanciação
	$conexao	= new Conexao();
	$conteudo	= new Conteudo($codigoConteudo, $codigoUsuario, $codigoDisciplina, $codigoMateria, $tituloConteudo, $dataConteudo, $arquivoConteudo);

	if($res = $conteudo->buscaAvancadaUsuario($codigoUsuario)) {
		
		?>

		<table cellspacing = "0" cellpadding = "5px">
				<tr>
					<th><p>C&oacute;digo</p></th>
					<th><p>T&iacute;tulo</p></th>
					<th><p>Anexo</p></th>
					<th><p>Opera&ccedil;&otilde;es</p></th>
				</tr>
		<?php
		while($array = mysql_fetch_array($res)){
	
			if($array['codigoMateria'] != 0){
				echo "<tr class = \"trConsulta\">";
			} else {
				echo "<tr class = \"trConsultaCuriosidade\">";
			}
			
			?>
				<td class = "center"><p><?php echo $array['codigoConteudo']?></p></td>
				
				<td><p><?php echo $array['tituloConteudo']?></p></td>
				
				<!-- Comandos para inverter a Data pro padrao BR
				<td class = "controle" class = "center">
					<?php 	echo "<p class = \"controle\">".$array['dataConteudo'] = implode("/",array_reverse(explode("-",$array['dataConteudo'])))."</p>"?>
				</td> -->
				
				<td class = "center">
					<a href = "downloads.php?arquivo=<?php echo urlencode($array['arquivoConteudo']) ?>" target="_blank"><img src = "./img/btnDownload.fw.png"  title = "Alterar este cadastro"/></a>
				</td>
				
				<td class = "center">
					<?php 	if($_SESSION[acessoUsuario] == "p") {?>
						<a href = "conteudos-p.php?operacao=1&codigo=<?php echo $array['codigoConteudo']?>"><img src = "./img/btnAlterar.fw.png"  title = "Alterar este cadastro"/></a>
						<a href = "conteudos-p.php?operacao=2&codigo=<?php echo $array['codigoConteudo']?>"><img src = "./img/btnExcluir.fw.png"  title = "Excluir este cadastro"/></a>
					<?php	} else { ?>
								<a href = "principal.php?pag=lerMais.php&codigo=<?php echo $array['codigoConteudo']?>">+</a>
					<?php 	}?>
				</td>
			</tr>
	
<?php	}
	} else {

	}
?>

</table>