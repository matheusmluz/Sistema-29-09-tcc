<?php ob_start();
	#valida sessão
	require_once("validasessao.php");
	
	if($_SESSION[acessoUsuario] != "p"){
		header('Location: index.php?pag=erro.php');
	}

	//includes
	include('classes/conexao.class.php');
	include('classes/disciplina.class.php');
	
	//instanciação
	$conexao	= new Conexao();
	$disciplina	= new Disciplina($codigoDisciplina, $nomeDisciplina);

	//chamada
	if(!$res = $disciplina->listarDisciplina()) {
		echo "<p class = \"center\">Sem cadastros</p>";
	} else {
?>
	<h1>Consulta de disciplinas</h1>
	<hr />
	<p class = "center">Disciplinas sem o <img src = "./img/btnExcluir.fw.png"/> est&atilde;o em uso e n&atilde;o podem ser deletadas.</p>
	<table cellspacing = "0" cellpadding = "5px">
		<tr>
			<th>C&oacute;digo</th>
			<th>Nome</th>
			<th>Opera&ccedil;&otilde;es</th>
		</tr>
		<?php 	while($array = mysql_fetch_array($res)){?>
			
			<tr class = "trConsulta">
				<td class = "center"><?php echo $array['codigoDisciplina']; ?></td>
				<td class = "center"><?php echo $array['nomeDisciplina']; ?></td>
				<td class = "center">
					<a href = "disciplinas-p.php?operacao=1&codigo=<?php echo $array['codigoDisciplina']?>"><img src = "./img/btnAlterar.fw.png"  title = "Alterar este cadastro"/></a>
					
					<?php	if($disciplina->testeFkConteudo($array['codigoDisciplina'])){ ?>
						<a href = "disciplinas-p.php?operacao=2&codigo=<?php echo $array['codigoDisciplina']?>"><img src = "./img/btnExcluir.fw.png"  title = "Excluir este cadastro"/></a>
					<?php	} ?>
				</td>
			</tr>
		<?php }}?>
	</table>
