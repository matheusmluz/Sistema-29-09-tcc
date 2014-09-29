<?php ob_start();
	#valida sessão
	require_once("validasessao.php");

	//verifica se há $codigo na url
	if(isset($_GET['codigo'])){
		$codigo	= $_GET['codigo'];
	}
	
	//includes
	include('classes/conexao.class.php');
	include('classes/usuario.class.php');
	
	//instanciação
	$conexao	= new Conexao();
	$usuario	= new Usuario($codigoUsuario, $nomeUsuario, $sobrenomeUsuario, $loginUsuario, $senhaUsuario, $emailUsuario, $acessoUsuario);
	
	if($usuario->buscarUsuario($codigo)){
		
		//se existe o registro, povoa os atributos do obj
		$codigoUsuario		= $usuario->getCodigoUsuario();
		$nomeUsuario		= $usuario->getNomeUsuario();
		$sobrenomeUsuario	= $usuario->getSobrenomeUsuario();
		$loginUsuario		= $usuario->getLoginUsuario();
		$senhaUsuario		= $usuario->getSenhaUsuario();
		$emailUsuario		= $usuario->getEmailUsuario();
?>
		<script type="text/javascript" src="js/validaUsuario.js"></script>
		
		<h1>Perfil</h1>
		<hr />
		<p class = "center">Para alterar seus dados basta reescrev&ecirc;-los e clicar em enviar.</p>
		
		<form name = "formUsuario" id = "formUsuario" action = "usuarios-p.php?operacao=3&codigo=<?php echo $codigoUsuario; ?>" method = "POST">
			<table>
				<tr>
					<td><label for = "nomeUsuario">Nome<span>*</span></label></td>
				</tr>
				<tr>
					<td><input type = "text" name = "nomeUsuario" id = "nomeUsuario" value = "<?php echo $nomeUsuario; ?>"/></td>
				</tr>
				<tr>
					<td><label for = "sobrenomeUsuario">Sobrenome<span>*</span></label></td>
				</tr>
				<tr>
					<td><input type = "text" name = "sobrenomeUsuario" id = "sobrenomeUsuario" value = "<?php echo $sobrenomeUsuario; ?>"/></td>
				</tr>
				<tr>
					<td><label for = "loginUsuarioCadastro">Nome de login<span>*</span></label></td>
				</tr>
				<tr>
					<td><input type = "text" name = "loginUsuarioCadastro" id = "loginUsuarioCadastro" value = "<?php echo $loginUsuario; ?>"/></td>
				</tr>	
				<tr>
					<td><label for = "emailUsuario">E-mail<span>*</span></label></td>
				</tr>
				<tr>
					<td><input type = "text" name = "emailUsuario" id = "emailUsuario" value = "<?php echo $emailUsuario; ?>"/></td>
				</tr>					
				<tr>
					<td>
						<input type = "submit" name = "envia" id = "enviar" value = "Enviar"/>
					
					<?php if($_SESSION[acessoUsuario] == "p"){?>
						<a href = "areaAdm.php?pag=usuarios-p.php&operacao=2&codigo=<?php echo $_SESSION[codigoUsuario]; ?>" title = "Excluir conta">
							<input type = "button" name = "excluir" id = "excluir" value = "Excluir"/>
						</a>
					<?php } else { ?>
						<a href = "principal.php?pag=usuarios-p.php&operacao=2&codigo=<?php echo $_SESSION[codigoUsuario]; ?>" title = "Excluir conta">
							<input type = "button" name = "excluir" id = "excluir" value = "Excluir"/>
						</a>
					<?php } ?>
					</td>
				</tr>
			</table>
		</form>
<?php
	}
?>