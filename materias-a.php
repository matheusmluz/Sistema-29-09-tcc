<?php ob_start();
	#valida sessão
	require_once("validasessao.php");
	
	if($_SESSION[acessoUsuario] != "p"){
		header('Location: index.php?pag=erro.php');
	}

	#verifica se há $codigo
	if(isset($_GET['codigo'])){
		$codigo	= $_GET['codigo'];
	}
	
	#includes
	include('classes/conexao.class.php');
	include('classes/materia.class.php');
	
	#instanciação
	$conexao	= new Conexao();
	$materia	= new Materia($codigoMateria, $nomeMateria);
		
	#busca se há matéria	
	if($materia->buscarMateria($codigo)){
		
		#povoa os atributos do obj
		$codigoMateria	= $materia->getCodigoMateria();
		$nomeMateria	= $materia->getNomeMateria();
?>

		<script type='text/javascript' src='js/validaMateria.js'></script>

		<h1>Altera&ccedil;&atilde;o de mat&eacute;ria</h1>
		<hr />
		<form name = "formMateria" id = "formMateria" action = "materias-p.php?operacao=3&codigo=<?php echo $codigoMateria;?>" method = "POST">
			<table>
				<tr>
					<td><label for = "nomeMateria">Nome da mat&eacute;ria<span>*</span></label></td>
				</tr>
				<tr>
					<td><input type = "text" name = "nomeMateria" id = "nomeMateria" value = "<?php echo $nomeMateria; ?>" maxlength = "50" /></td>
				</tr>
				<tr>
					<td>
						<input type = "submit" name = "envia" id = "enviar" value = "Enviar"/>
						<a href = "areaAdm.php?pag=materias-c.php" title = "Consultar registros">
							<input type = "button" name = "envia" id = "enviar" value = "Voltar"/>
						</a>
					</td>
				</tr>
			</table>
		</form>
<?php } ?>