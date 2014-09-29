<?php
	class Usuario {
		private $codigoUsuario;
		private $nomeUsuario;
		private $sobrenomeUsuario;
		private $loginUsuario;
		private $senhaUsuario;
		private $emailUsuario;
		private $acessoUsuario;
		
		//********************* CONSTRUCT *********************
		public function __Construct($codigoUsuario, $nomeUsuario, $sobrenomeUsuario, $loginUsuario, $senhaUsuario, $emailUsuario, $acessoUsuario){
			$this->setCodigoUsuario($codigoUsuario);
			$this->setNomeUsuario($nomeUsuario);
			$this->setSobrenomeUsuario($sobrenomeUsuario);
			$this->setLoginUsuario($loginUsuario);
			$this->setSenhaUsuario($senhaUsuario);
			$this->setEmailUsuario($emailUsuario);
			$this->setAcessoUsuario($acessoUsuario);
		}
		
		//********************* SETS *********************
		public function setCodigoUsuario($codigoUsuario){
			$this->codigoUsuario = $codigoUsuario;
		}
		
		public function setNomeUsuario($nomeUsuario){
			$this->nomeUsuario = $nomeUsuario;
		}
		
		public function setSobrenomeUsuario($sobrenomeUsuario){
			$this->sobrenomeUsuario = $sobrenomeUsuario;
		}
		
		public function setLoginUsuario($loginUsuario){
			$this->loginUsuario = $loginUsuario;
		}
		
		public function setSenhaUsuario($senhaUsuario){
			$this->senhaUsuario = $senhaUsuario;
		}
		
		public function setEmailUsuario($emailUsuario){
			$this->emailUsuario = $emailUsuario;
		}
		
		public function setAcessoUsuario($acessoUsuario){
			$this->acessoUsuario = $acessoUsuario;
		}
		
		//********************* GETS *********************
		public function getCodigoUsuario(){
			return $this->codigoUsuario;
		}
		
		public function getNomeUsuario(){
			return $this->nomeUsuario;
		}
		
		public function getSobrenomeUsuario(){
			return $this->sobrenomeUsuario;
		}
		
		public function getLoginUsuario(){
			return $this->loginUsuario;
		}
		
		public function getSenhaUsuario(){
			return $this->senhaUsuario;
		}
		
		public function getEmailUsuario(){
			return $this->emailUsuario;
		}
		
		public function getAcessoUsuario(){
			return $this->acessoUsuario;
		}
		
		//********************* MÉTODOS *********************
		public function incluirUsuario(){
			#verifica se já tem um registro com este código
			if(!$this->verificarUsuario($this->getCodigoUsuario(), $this->getLoginUsuario())){
				$query	= "	INSERT INTO Usuarios (codigoUsuario, nomeUsuario, sobrenomeUsuario, loginUsuario, senhaUsuario, emailUsuario, acessoUsuario)
							VALUES ('"	.	$this->getCodigoUsuario()		.	"',
									'"	.	$this->getNomeUsuario()			.	"',
									'"	.	$this->getSobrenomeUsuario()	.	"',
									'"	.	$this->getLoginUsuario()		.	"',
									'"	.	md5($this->getSenhaUsuario())	.	"',
									'"	.	$this->getEmailUsuario()		.	"',
									'"	.	$this->getAcessoUsuario()		.	"');";
				return mysql_query($query) or die(mysql_error());
			} else {
				return false;
			}		
		}
		
		public function verificarUsuario($codigoUsuario, $loginUsuario){
			$query	= "	SELECT 	codigoUsuario, nomeUsuario, sobrenomeUsuario, loginUsuario, senhaUsuario, emailUsuario, acessoUsuario
						FROM	Usuarios
						WHERE	loginUsuario 	= '".	$loginUsuario	."';";
						
			#se o comando sql for executado..
			if($res = mysql_query($query)){
				$row	= mysql_fetch_row($res);
				$nr		= (int)mysql_num_rows($res);
				
				#se conter algum registro
				if($nr === 1){
					$this->setCodigoUsuario($row[0]);
					$this->setNomeUsuario($row[1]);
					$this->setSobrenomeUsuario($row[2]);
					$this->setLoginUsuario($row[3]);
					$this->setSenhaUsuario($row[4]);
					$this->setEmailUsuario($row[5]);
					$this->setAcessoUsuario($row[6]);
					return true;
				} else {
					return false;
				}
			
			} else {
				return false;
			}
						
		}
		
		public function buscarUsuario($codigoUsuario){
			$query	= "	SELECT 	codigoUsuario, nomeUsuario, sobrenomeUsuario, loginUsuario, senhaUsuario, emailUsuario, acessoUsuario
						FROM	Usuarios
						WHERE	codigoUsuario 	= ".	$codigoUsuario;
						
			#se o comando sql for executado..
			if($res = mysql_query($query)){
				$row	= mysql_fetch_row($res);
				$nr		= (int)mysql_num_rows($res);
				
				#se conter algum registro
				if($nr === 1){
					$this->setCodigoUsuario($row[0]);
					$this->setNomeUsuario($row[1]);
					$this->setSobrenomeUsuario($row[2]);
					$this->setLoginUsuario($row[3]);
					$this->setSenhaUsuario($row[4]);
					$this->setEmailUsuario($row[5]);
					$this->setAcessoUsuario($row[6]);
					return true;
				} else {
					return false;
				}
			
			} else {
				return false;
			}
						
		}
		
		public function listarUsuario(){
			$query	= "	SELECT 		codigoUsuario, nomeUsuario, sobrenomeUsuario, loginUsuario, senhaUsuario, emailUsuario, acessoUsuario
						FROM		Usuarios
						ORDER BY	codigoUsuario";
			$res	= mysql_query($query) or die(mysql_error());
			$nr		= (int)mysql_num_rows($res);
			
			if($nr === 0){
				return false;
			} else {
				return $res;
			}
		}
		
		public function excluirUsuario($codigoUsuario){
			$query	= "	DELETE FROM Usuarios
						WHERE		codigoUsuario = "	.	$codigoUsuario;

			unset($_SESSION[codigoUsuario]);
			unset($_SESSION[loginUsuario]);
			unset($_SESSION[senhaUsuario]);
			unset($_SESSION[acessoUsuario]);
			
			return mysql_query($query) or die(mysql_error());
		}
		
		public function alterarUsuario($codigoUsuario){
			$query	= "	UPDATE Usuarios
						SET		nomeUsuario					= '"	.	$this->getNomeUsuario()	.	"',
								sobrenomeUsuario			= '"	.	$this->getSobrenomeUsuario()	."',
								loginUsuario				= '"	.	$this->getLoginUsuario()		."',
								emailUsuario				= '"	.	$this->getEmailUsuario()		."'
						WHERE codigoUsuario = "	.	$codigoUsuario;
			return mysql_query($query) or die(mysql_error());
		}
		
		public function validarUsuario($loginUsuario, $senhaUsuario){
			$query	= "	SELECT	codigoUsuario, loginUsuario, senhaUsuario, acessoUsuario
						FROM	Usuarios
						WHERE	loginUsuario	= '"	.	$loginUsuario	.	"' 
						AND		senhaUsuario	= '"	.	$senhaUsuario	.	"';";
						
						/*AND		acessoUsuario	= "		.	"p"				.	"
						OR		acessoUsuario	= "		.	"a"				.	";";"*/
						
			if($res = mysql_query($query)){
				$array	= mysql_fetch_array($res);
				$nr		= (int)mysql_num_rows($res);
				
				if($nr === 1){
					#condição de operação
					if($array['acessoUsuario'] == "p" || $array['acessoUsuario'] == "a"){
						$this->logarUsuario($array['codigoUsuario'], $array['loginUsuario'], $array['senhaUsuario'], $array['acessoUsuario']);
					} else {
						header('Location: index.php?pag=erro.php');
						return false;
					}
				} else {
					header('Location: index.php?pag=erro.php');
					return false;
				}
			
			} else {	
				header('Location: index.php?pag=erro.php');
				return false;
			}
		}
		
		public function logarUsuario($codigoUsuario, $loginUsuario, $senhaUsuario, $acessoUsuario){		
			$query	= "	SELECT	codigoUsuario, loginUsuario, senhaUsuario, acessoUsuario
						FROM	Usuarios
						WHERE	loginUsuario	= '"	.	$loginUsuario	.	"' 
						AND		senhaUsuario	= '"	.	$senhaUsuario	.	"';";
			
			$res	= mysql_query($query) or die(mysql_error());
			
			$array	= mysql_fetch_array($res);
			$nr 	= (int)mysql_num_rows($res);
			
			if($nr === 1){			
				session_start();
				$_SESSION[codigoUsuario]	= $array['codigoUsuario'];
				$_SESSION[loginUsuario]		= $array['loginUsuario'];
				$_SESSION[senhaUsuario]		= $array['senhaUsuario'];
				$_SESSION[acessoUsuario]	= $array['acessoUsuario'];
				
				if($_SESSION[acessoUsuario] == "a"){
					header('Location: principal.php');
				} else {
					header('Location: areaAdm.php');
				}				
			}			
		}
		
		public function deslogarUsuario() {
			session_start();
			unset($_SESSION[codigoUsuario]);
			unset($_SESSION[loginUsuario]);
			unset($_SESSION[senhaUsuario]);
			unset($_SESSION[acessoUsuario]);

			return header("Location: index.php");
		}
		
	}
?>






































