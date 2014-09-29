<?php ob_start();
	#valida sessão
	require_once("validasessao.php");
	
	if($_SESSION[acessoUsuario] != "p"){
		header('Location: index.php?pag=erro.php');
	}
	
	#includes
	include('classes/conexao.class.php');
	include('classes/materia.class.php');
	
	#instanciação
	$conexao	= new Conexao();
	$materia	= new Materia($codigoMateria, $nomeMateria);
	
	#chamada
	if(!$res = $materia->listarMateria()){
		echo "<p class = \"center\">Sem cadastros</p>";
	} else {
?>
		<h1>Consulta de mat&eacute;rias</h1>
		<hr />
		<p class = "center">Mat&eacute;rias sem o <img src = "./img/btnExcluir.fw.png"/> est&atilde;o em uso e n&atilde;o podem ser deletadas.</p>
		<table cellspacing = "0" cellpadding = "5px">
			<tr>
				<th>C&oacute;digo</th>
				<th>Mat&eacute;ria</th>
				<th>Opera&ccedil;&otilde;es</th>
			</tr>
			<?php	while($array = mysql_fetch_array($res)) {?>
						<tr class = "trConsulta">
							<td class = "center"> <?php echo $array['codigoMateria'];?> </td>
							<td class = "center"> <?php echo $array['nomeMateria'] ;?></td>
							<td class = "center">
								<a href = "materias-p.php?operacao=1&codigo=<?php echo $array['codigoMateria'];?>"><img src = "./img/btnAlterar.fw.png"  title = "Alterar este cadastro"/></a>
								
								<?php if($materia->testeFkConteudo($array['codigoMateria'])){?>
									<a href = "materias-p.php?operacao=2&codigo=<?php echo $array['codigoMateria'];?>"><img src = "./img/btnExcluir.fw.png"  title = "Excluir este cadastro"/></a>
								<?php } ?>
							</td>
						</tr>
			<?php	}}?>
		</table>