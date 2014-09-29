

 <html>
	<head>
		<title>TeacherON</title>
		<meta name="viewport" content="width:device-width">
		<meta charset="UTF-8"/>
		<link rel="icon" href="img/favicon.ico" type="image/icon"/>
		
		<!--Chrome e responsive-->
		<link rel="stylesheet" type="text/css" href="css/index_mobile.css" media="all and (max-width:320px)">
		<link rel="stylesheet" type="text/css" href="css/index_tablet.css" media="all and (min-width:321px) and (max-width:960px)">
		<link rel="stylesheet" type="text/css" href="css/index_desktop.css" media="all and (min-width:961px)">

		<!--JS's-->
		<script type='text/javascript' src='js/jquery.js'></script>
		<script type='text/javascript' src='js/jquery-ui_1.9.1.js'></script>
		<script type='text/javascript' src='js/menuMobile.js'></script>
		<script type='text/javascript' src='js/jquery.validate.js'></script>
		<script type='text/javascript' src='js/validaUsuario.js'></script>
		<script type='text/javascript' src='js/validaLogin.js'></script>
		<script type='text/javascript' src='js/btnLogin.js'></script>
	</head>
	
	<body>
		<div id = "geral">
			<div id = "topo">
				<div id = "contTopo">
					
					<!-- Logo -->
					<a href = "index.php"><div id = "logo"></div></a>
					
					<!-- Login desk -->
					<div id = "loginDesktop">
						<form name = "login" id = "login" action = "login.php" method = "POST">
							<table>
								<tr>
									<td><label for = "loginUsuario">Login</label></td>
									<td><input type = "text" name = "loginUsuario" id = "loginUsuario" maxlenght = "30" /></td>
									<td><label for = "senhaUsuario">Senha</label></td>
									<td><input type = "password" name = "senhaUsuario" id = "senhaUsuario" maxlenght = "32" /></td>
									<td><input type = "submit" name = "enviarLogin" id = "enviarLogin" value = "Entrar" /></td>
								</tr>
							</table>
						</form>
					</div>
					
					<!-- Login mobile & tablet -->
					<div id = "btnLogin"></div>
					<div id = "loginMobile">
								
						<form name = "loginMob" id = "loginMob" action = "login.php" method = "POST">
								<table>
									<tr>
										<td><label for = "loginUsuario">Login</label></td>
									</tr>
									<tr>
										<td><input type = "text" name = "loginUsuario" id = "loginUsuario" maxlenght = "30" /></td>
									</tr>
									<tr>
										<td><label for = "senhaUsuario">Senha</label></td>
									</tr>
									<tr>
										<td><input type = "password" name = "senhaUsuario" id = "senhaUsuario" maxlenght = "32" /></td>
									</tr>
									<tr>
										<td><input type = "submit" name = "enviarLogin" id = "enviarLogin" value = "Entrar" />
											<input type = "reset" name = "reset" id = "reset" value = "Cancelar" /></td>
									</tr>
								</table>
						</form>
						<p class = "center">Usu&aacute;rio novo? cadastre-se <a href = "?pag=usuarios-f.php">aqui</a></p>
					</div>
					
				</div>
			</div>
			
			<div id = "contDesktop">
				<?php  
					if(isset($_GET['pag'])){
						include($_GET['pag']);
					} else {
						include('usuarios-f.php');
					}
				?>
			</div>
			
		</div>
		
		<div id = "rodape">
			<p class = "rodape">2014&copy; Criado por Matheus Luz.</p>
		</div>
			
	</body>
</html>