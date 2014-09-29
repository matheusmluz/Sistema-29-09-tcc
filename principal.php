<?php ob_start();
	#valida sessão
	require_once("validasessao.php");
	session_start();
	
?>

<html>
	<head>
		<title>TeacherON</title>
		<?php include('includes/header.txt'); ?>
	</head>
	
	<body>
		<!-- Site +960px -->
		<div id = "geralDesktop">
			<div id = "topo">
				<div id = "contTopo">
					
					<!-- Logo desk -->
					<a href="principal.php"><div id = "logoDesktop"></div></a>
					
					<!-- Menu para desktop -->
					<div id = "menuDesktop">
						<ul class ="style">
							<li><a href = "?pag=usuarios-a.php&codigo=<?php echo $_SESSION[codigoUsuario]; ?>">Perfil</a></li>
							<li><a href="?pag=conteudos-c.php">Conte&uacute;dos</a></li>
							<li><a href="principal.php?pag=logoff.php">Sair</a></li>
						</ul>
					</div>
				</div>
			</div>
			
			<div id = "contDesktop">
				<?php  
					if(isset($_GET['pag'])){
						include($_GET['pag']);
					} else {
						echo "<p class = \"center\">Bem-vindo(a) ao TeacherON, $_SESSION[loginUsuario]!</p>";
					}
				?>
			</div>
		
		</div>
		
		<!-- Site -960px -->
		<div id = "geralMobile">
			<!-- Menu para mobile -->
			<div id = "menuMobile">
				<div id = "col"></div>
				<div id = "col"></div>
				<div id = "col"></div>
			</div>
				<div id = "scrollMobile">
					<ul class ="mobile">
						<li><p>Perfil</p>
							<ul>
								<a href="?pag=usuarios-a.php&codigo=<?php echo $_SESSION[codigoUsuario]; ?>"><li>Ver perfil</li></a>
								<a href="principal.php?pag=logoff.php"><li>Sair</li></a>
							</ul>

						</li>

						<a href="?pag=conteudos-c.php"><li>Conteudos</li></a>
						<a href="#"><li class = "fechar">Fechar</li></a>							
					</ul>	
				</div>
			
			<!-- Logo mobile e tablet -->
			<div id = "logoMobile"></div>
		</div>
	</body>
</html>