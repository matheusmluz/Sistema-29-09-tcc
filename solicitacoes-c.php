<?php ob_start();
	#valida sessão
	require_once("validasessao.php");
	
	if($_SESSION[acessoUsuario] != "p"){
		header('Location: index.php?pag=erro.php');
	}

	#includes
	include('classes/conexao.class.php');
	include('classes/solicitacao.class.php');

	#instanciacao
	$conexao		= new Conexao();
	$solicitacao	= new Solicitacao();

	#chamada
	if(!$res = $solicitacao->listarSolicitacao()) {
		echo "<p class = \"center\">Sem solicita&ccedil;&otilde;es de acesso.</p>";
	} else {
?>
	<h1>Solicita&ccedil;&otilde;es</h1>
	<hr />
	<p class = "center">Usu&aacute;rios novos s&atilde;o destacados em <b>negrito</b>.</p>
	<table cellspacing = "0" cellpadding = "5px">
		<tr>
			<th>C&oacute;digo</th>
			<th>Nome completo</th>
			<th>Opera&ccedil;&otilde;es</th>
		</tr>
		<?php 	while($array = mysql_fetch_array($res)){?>
			
			<tr class = "trConsulta">
				<?php if($array['acessoUsuario'] == "n"){?>
					<td class = "center"><p class = "novo"><?php echo $array['codigoUsuario']; ?></p></td>
					<td class = "center"><p  class = "novo"><?php echo $array['nomeUsuario'] . " " . $array['sobrenomeUsuario']; ?></p></td>
					<td class = "center">
				<?php } else {?>
					<td class = "center"><p><?php echo $array['codigoUsuario']; ?></p></td>
					<td class = "center"><p><?php echo $array['nomeUsuario'] . " " . $array['sobrenomeUsuario']; ?></p></td>
					<td class = "center">
				<?php }?>
					<?php if($array['acessoUsuario'] == "n"){?>
						<a href = "solicitacoes-p.php?operacao=1&codigo=<?php echo $array['codigoUsuario'];?>"><img src = "./img/aceitar.fw.png"  title = "Aceitar aluno"/></a>
					<?php }?>
					<a href = "solicitacoes-p.php?operacao=2&codigo=<?php echo $array['codigoUsuario'];?>"><img src = "./img/btnExcluir.fw.png"  title = "Excluir aluno"/></a>
					<a href = "solicitacoes-p.php?operacao=3&codigo=<?php echo $array['codigoUsuario'];?>"><img src = "./img/prof.fw.png"  title = "Tornar professor"/></a>
					
				</td>
			</tr>
		<?php }}?>
	</table>
