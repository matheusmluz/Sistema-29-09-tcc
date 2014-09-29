
<script type = "text/javascript" src = "js/controleTabelas.js"></script>
<script type = "text/javascript" src = "js/teste.js"></script>

<script type = "text/javascript" src = "js/buscaAvancadaDisciplina.js"></script>

<script type = "text/javascript" src = "js/buscaAvancadaMateria.js"></script>

<script type = "text/javascript" src = "js/buscaAvancadaUsuario.js"></script>

<script>
function mensagem (codigoConteudo) {
	var link = "http://www.facebook.com/sharer.php?u=http://localhost/Sistema%2029-09/areaAdm.php?pag=lerMais.php&codigo="+codigoConteudo;
	//var link = "https://www.facebook.com/sharer/sharer.php?u=http://localhost/Sistema%2029-09/areaAdm.php?pag=lerMais.php&codigo="+codigoConteudo; 
	window.open(link, 'facebook_share', 'height=320, width=640, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no',"gl");
}
	
</script>
		
<?php ob_start();
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
	$conteudo	= new Conteudo($codigoConteudo, $codigoUsuario,$codigoDisciplina, $codigoMateria, $tituloConteudo, $dataConteudo, $arquivoConteudo);


	//chamada
	if(!$res = $conteudo->listarConteudo()) {
		echo "<p class = \"center\">Sem cadastros</p>";
	} else {
		$resDisciplina	= $conteudo->listarDisciplina();
		$resMateria		= $conteudo->listarMateria();
		$resProfessor	= $conteudo->listarProfessor();
?>
		<h1>Consulta de conte&uacute;dos</h1>
		<hr />
		
		<h2 class = "center">Busca avançada</h2>
		<table cellspacing = "0" cellpadding = "5px">
			<tr>
				<th><p>Disciplina</p></th>
				<th><p>Mat&eacute;ria</p></th>
				<th><p>Professor</p></th>
			</tr>
			
			<tr>
				<td>
					<select name = "codigoDisciplina" id = "codigoDisciplina">
						<option value = "0"></option>
						<?php 
								while($array = mysql_fetch_array($resDisciplina)){
						?>
									<option value = "<?php echo $array['codigoDisciplina']; ?>"><?php echo $array['nomeDisciplina']; ?></option>
						<?php	
								}
						?>
					</select>
				</td>
				<td>
					<select name = "codigoMateria" id = "codigoMateria">
						<option value = "0"></option>
						<?php 
								while($array = mysql_fetch_array($resMateria)){
						?>
									<option value = "<?php echo $array['codigoMateria']; ?>"><?php echo $array['nomeMateria']; ?></option>
						<?php	
								}
						?>
					</select>
				</td>
				<td>
					<select name = "codigoUsuario" id = "codigoUsuario">
						<option value = "0"></option>
						<?php 
								while($array = mysql_fetch_array($resProfessor)){
						?>
									<option value = "<?php echo $array['codigoUsuario']; ?>"><?php echo $array['loginUsuario']; ?></option>
						<?php	
								}
						?>
					</select>
				</td>
			</tr>

		</table>
		<p class = "center">Filtro vazio = geral.</p>
		<p class = "center">Linhas verdes s&atilde;o curiosidades.</p>
<div id = "info">
		<table cellspacing = "0" cellpadding = "5px">
			<tr>
				<th><p>C&oacute;digo</p></th>
				<th><p>T&iacute;tulo</p></th>
				<th><p>Anexo</p></th>
				<th><p>Opera&ccedil;&otilde;es</p></th>
			</tr>
			
<?php 	while($array = mysql_fetch_array($res)){
			
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
						<input type = "button" name = "compartilhar" id = "compartilhar" value = "c" onclick = "mensagem(<?php echo $array['codigoConteudo']?>)"/>
					<?php	} else { ?>
								<a href = "principal.php?pag=lerMais.php&codigo=<?php echo $array['codigoConteudo']?>">+</a>
					<?php 	}?>
				</td>
			</tr>
			
<?php 	} #fecha WHILE do array
	} #fecha ELSE da chamada do método 
	/*onclick = "mensagem(<?php echo $array['codigoConteudo'] ?>)"*/
?>
</table>
</div>