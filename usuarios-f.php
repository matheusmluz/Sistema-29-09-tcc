<h1>Cadastre-se!</h1>
<hr />
<p class = "center">Campos marcados com <span>*</span> s&atilde;o obrigat&oacute;rios.</p>
	<form name = "formUsuario" id = "formUsuario" action = "usuarios-p.php" method = "POST">
		<table>
			<tr>
				<td><label for = "nomeUsuario">Nome<span>*</span></label></td>
			</tr>
			<tr>
				<td><input type = "text" name = "nomeUsuario" id = "nomeUsuario"/></td>
			</tr>
			<tr>
				<td><label for = "sobrenomeUsuario">Sobrenome<span>*</span></label></td>
			</tr>
			<tr>
				<td><input type = "text" name = "sobrenomeUsuario" id = "sobrenomeUsuario"/></td>
			</tr>
			<tr>
				<td><label for = "loginUsuarioCadastro">Nome de login<span>*</span></label></td>
			</tr>
			<tr>
				<td><input type = "text" name = "loginUsuarioCadastro" id = "loginUsuarioCadastro"/></td>
			</tr>
			<tr>
				<td><label for = "senhaUsuarioCadastro">Senha<span>*</span></label></td>
			</tr>
			<tr>
				<td><input type = "password" name = "senhaUsuarioCadastro" id = "senhaUsuarioCadastro"/></td>
			</tr>
			<tr>
				<td><label for = "emailUsuario">E-mail<span>*</span></label></td>
			</tr>
			<tr>
				<td><input type = "email" name = "emailUsuario" id = "emailUsuario"/></td>
			</tr>
			<tr>
				<td><input type = "submit" name = "enviar" id = "enviar" value = "Enviar" />
					<input type = "reset" name = "reset" id = "reset" value = "Cancelar" /></td>
			</tr>
		</table>
	</form>