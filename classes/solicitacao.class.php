<?php 
	class Solicitacao {
	
		//********************* MÉTODOS *********************
		public function listarSolicitacao(){
			$query	= "	SELECT 	codigoUsuario, nomeUsuario, sobrenomeUsuario, loginUsuario, senhaUsuario, emailUsuario, acessoUsuario
						FROM	Usuarios
						WHERE	acessoUsuario != 'p'	
						ORDER BY	acessoUsuario = 'n' DESC";

			$res	= mysql_query($query) or die(mysql_error());
			$nr		= (int)mysql_num_rows($res);
			
			//verifica se há registro
			if($nr === 0){
				return false;
			} else {
				return $res;
			}	
		}
		
		public function buscarUsuario($codigoUsuario){
			$query	= "	SELECT 	codigoUsuario, emailUsuario, acessoUsuario
						FROM	Usuarios
						WHERE	codigoUsuario = "	.	$codigoUsuario;
						
				
			if($res = mysql_query($query)){
				$nr	= (int)mysql_num_rows($res);
				
				if($nr === 1){
					$array	= mysql_fetch_array($res);
					return true;
				} else {
					return false;
				}
			
			} else {
				return false;
			}
			
		}
		
		public function aceitarUsuario($codigoUsuario){
			if($this->buscarUsuario($codigoUsuario)){
				$query	= "	UPDATE Usuarios
							SET		acessoUsuario				= 'a'
							WHERE codigoUsuario = "	.	$codigoUsuario;
							
				if($array = $this->email($codigoUsuario)) {
					date_default_timezone_set('UTC');
					
					ini_set("SMTP","localhost" ); 
					ini_set('sendmail_from', 'localhost'); 
					ini_set('smtp_port', '25'); 
				
					$to			= $array['emailUsuario'];
					$subject	= 'Conta confirmada';
					$message	= 'Prezado(a) '.$array['nomeUsuario'].' Sua conta foi confirmada!';
					
					mail($to, $subject, $message);
				}	
				
				return mysql_query($query) or die(mysql_error());
			} else {
				return false;
			}
		}
		
		public function email($codigoUsuario){
			$query	= "	SELECT 	codigoUsuario, emailUsuario, nomeUsuario, sobrenomeUsuario
						FROM	Usuarios
						WHERE	codigoUsuario = "	.	$codigoUsuario;
			$res = mysql_query($query) or die(mysql_error());
					
			return $array = mysql_fetch_array($res);
		}
		
		public function recusarUsuario($codigoUsuario){
			if($this->buscarUsuario($codigoUsuario)){
				$query	= "	DELETE FROM Usuarios
							WHERE		codigoUsuario = "	.	$codigoUsuario;
							
				return mysql_query($query) or die(mysql_error());
			} else {
				return false;
			}
		}
		
		public function mudarUsuario($codigoUsuario){
			if($this->buscarUsuario($codigoUsuario)){
				$query	= "	UPDATE Usuarios
							SET		acessoUsuario				= 'p'
							WHERE codigoUsuario = "	.	$codigoUsuario;
							
				if($array = $this->email($codigoUsuario)) {
					date_default_timezone_set('UTC');
					
					ini_set("SMTP","localhost" ); 
					ini_set('sendmail_from', 'localhost'); 
					ini_set('smtp_port', '25'); 
				
					$to			= $array['emailUsuario'];
					$subject	= 'Conta confirmada';
					$message	= 'Prezado(a) '.$array['nomeUsuario'].' Sua conta foi confirmada!';
					
					mail($to, $subject, $message);
				}
				
				return mysql_query($query) or die(mysql_error());
			} else {
				return false;
			}
		}
	}

?>














