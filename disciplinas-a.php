<?php ob_start();
	#valida sessão
	require_once("validasessao.php");
	
	if($_SESSION[acessoUsuario] != "p"){
		header('Location: index.php?pag=erro.php');
	}

	//verifica se há $codigo na url
	if(isset($_GET['codigo'])){
		$codigo	= $_GET['codigo'];
	}
	
	//includes
	include('classes/conexao.class.php');
	include('classes/disciplina.class.php');
	
	//instanciação
	$conexao	= new Conexao();
	$disciplina	= new Disciplina($codigoDisciplina, $nomeDisciplina);
	
	if($disciplina->buscarDisciplina($codigo)){
		
		//se existe o registro, povoa os atributos do obj
		$codigoDisciplina	= $disciplina->getCodigoDisciplina();
		$nomeDisciplina		= $disciplina->getNomeDisciplina();
?>
		<script type="text/javascript" src="js/validaDisciplina.js"></script>
		
		<h1>Altera&ccedil;&atilde;o de disciplina</h1>
		<hr />
		<form name = "formDisciplina" id = "formDisciplina" action = "disciplinas-p.php?operacao=3&codigo=<?php echo $codigoDisciplina; ?>" method = "POST">
			<table>
				<tr>
					<td><label for = "nomeDisciplina">Nome da disciplina<span>*</span></label></td>
				</tr>
				<tr>
					<td><input type = "text" name = "nomeDisciplina" id = "nomeDisciplina" value = "<?php echo $nomeDisciplina; ?>" maxlength = "50" /></td>
				</tr>	
				<tr>
					<td>
						<input type = "submit" name = "envia" id = "enviar" value = "Enviar"/>
						<a href = "areaAdm.php?pag=disciplinas-c.php" title = "Consultar registros">
							<input type = "button" name = "envia" id = "enviar" value = "Voltar"/>
						</a>
					</td>
				</tr>
			</table>
		</form>
<?php
	}
?>