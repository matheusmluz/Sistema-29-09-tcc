<?php ob_start();
	#valida sessão
	require_once("validasessao.php");
	
	if($_SESSION[acessoUsuario] != "p"){
		header('Location: index.php?pag=erro.php');
	}
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
					<div id = "areaLogo">
						<a href="areaAdm.php">
							<div id = "logoDesktop">
								<img src  = "./img/logo.fw.png" />
							</div>
						</a>
					</div>
					<!-- Menu para desktop -->
					<div id = "menuDesktop">
						<ul class ="style">
							<li><a href="?pag=usuarios-a.php&codigo=<?php echo $_SESSION[codigoUsuario]; ?>">Ver perfil</a>
								<ul>
									<li><a href="areaAdm.php?pag=logoff.php">Sair</a></li>
								</ul>
							</li>
							<li><a>Cadastros</a>
								<ul>
									<li><a href="?pag=disciplinas-f.php">Disciplinas</a></li>
									<li><a href="?pag=materias-f.php">Mat&eacute;rias</a></li>
									<li><a href="?pag=conteudos-f.php">Conte&uacute;dos</a></li>                    
								</ul>

							</li>

							<li><a>Consultas</a>
								<ul>
									<li><a href="?pag=disciplinas-c.php">Disciplinas</a></li>
									<li><a href="?pag=materias-c.php">Mat&eacute;rias</a></li>
									<li><a href="?pag=conteudos-c.php">Conte&uacute;dos</a></li>
								</ul>

							</li>
							<li><a href="?pag=solicitacoes-c.php">Solicita&ccedil;&otilde;es</a></li>               
						</ul>
					</div>
				</div>
			</div>
			
			<div id = "contDesktop">
				<?php  
					if(isset($_GET['pag'])){
						include($_GET['pag']);
					} else {
						echo "<p class = \"center\">Bem-vindo(a), professor(a) $_SESSION[loginUsuario].</p>";
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
								<a href="areaAdm.php?pag=logoff.php"><li>Sair</li></a>                   
							</ul>

						</li>						
						<li><p>Cadastros</p>
							<ul>
								<a href="?pag=disciplinas-f.php"><li>Disciplinas</li></a>
								<a href="?pag=materias-f.php"><li>Matérias</li></a>
								<a href="?pag=conteudos-f.php"><li>Conteúdos</li></a>                   
							</ul>

						</li>

						<li><p>Consultas</p>
							<ul>
								<a href="?pag=disciplinas-c.php"><li>Disciplinas</li></a>
								<a href="?pag=materias-c.php"><li>Matérias</li></a>
								<a href="?pag=conteudos-c.php"><li>Conteúdos</li></a>
							</ul>

						</li>
						<a href="?pag=solicitacoes-c.php"><li>Solicitações</li></a> 
						<a href="#"><li class = "fechar">Fechar</li></a>							
					</ul>	
				</div>
			
			<!-- Logo mobile e tablet -->
			<div id = "logoMobile"></div>
		</div>
		<div id = "rodape">
			<p class = "rodape">2014&copy; Criado por Matheus Luz.</p>
		</div>
	</body>
</html>