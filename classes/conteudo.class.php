<?php
	class Conteudo{
		private $codigoConteudo;
		private $codigoUsuario;
		private $codigoDisciplina;
		private $codigoMateria;
		private $tituloConteudo;
		private $dataConteudo;
		private $arquivoConteudo;
		
		//********************* CONSTRUCT *********************
		public function __Construct($codigoConteudo, $codigoUsuario, $codigoDisciplina, $codigoMateria, $tituloConteudo, $dataConteudo, $arquivoConteudo){
			$this->setCodigoConteudo($codigoConteudo);
			$this->setCodigoUsuario($codigoUsuario);
			$this->setCodigoDisciplina($codigoDisciplina);
			$this->setCodigoMateria($codigoMateria);
			$this->setTituloConteudo($tituloConteudo);
			$this->setDataConteudo($dataConteudo);
			$this->setArquivoConteudo($arquivoConteudo);
		}
		
		//********************* SETs *********************
		public function setCodigoConteudo($codigoConteudo){
			$this->codigoConteudo = $codigoConteudo;
		}
		
		public function setCodigoUsuario($codigoUsuario){
			$this->codigoUsuario = $codigoUsuario;
		}
		
		public function setCodigoDisciplina($codigoDisciplina){
			$this->codigoDisciplina = $codigoDisciplina;
		}
		
		public function setCodigoMateria($codigoMateria){
			$this->codigoMateria = $codigoMateria;
		}
		
		public function setTituloConteudo($tituloConteudo){
			$this->tituloConteudo = $tituloConteudo;
		}
		
		public function setDataConteudo($dataConteudo){
			$this->dataConteudo = $dataConteudo;
		}
		
		public function setArquivoConteudo($arquivoConteudo){
			$this->arquivoConteudo = $arquivoConteudo;
		}
		
		//********************* GETs *********************
		public function getCodigoConteudo(){
			return $this->codigoConteudo;
		}
		
		public function getCodigoUsuario(){
			return $this->codigoUsuario;
		}
		
		public function getCodigoDisciplina(){
			return $this->codigoDisciplina;
		}
		
		public function getCodigoMateria(){
			return $this->codigoMateria;
		}
		
		public function getTituloConteudo(){
			return $this->tituloConteudo;
		}
		
		public function getDataConteudo(){
			return $this->dataConteudo;
		}
		
		public function getArquivoConteudo(){
			return $this->arquivoConteudo;
		}
		
		//********************* MÉTODOS *********************
		public function incluirConteudo(){
			if(!$this->buscarConteudo($this->getCodigoConteudo())){
				$query	= "	INSERT INTO Conteudos (codigoConteudo, codigoUsuario, codigoDisciplina, codigoMateria, tituloConteudo, dataConteudo, arquivoConteudo)
							VALUES	(	'"	.	$this->getCodigoConteudo()	.	"',
										'"	.	$this->getCodigoUsuario()	.	"',
										'"	.	$this->getCodigoDisciplina().	"',
										'"	.	$this->getCodigoMateria()	.	"',
										'"	.	$this->getTituloConteudo()	.	"',
										'"	.	$this->getDataConteudo()	.	"',										
										'"	.	$this->getArquivoConteudo()	.	"');";
				return mysql_query($query) or die(mysql_error());
			} else {
				return false;
			}
		}		
		
		public function buscarConteudo($codigoConteudo){
			$query	= "	SELECT 	codigoConteudo, codigoUsuario, codigoDisciplina, codigoMateria, tituloConteudo, dataConteudo, arquivoConteudo
						FROM	Conteudos
						WHERE	codigoConteudo = "	.	$codigoConteudo;
						
			if($res = mysql_query($query)){
				$row	= mysql_fetch_row($res);
				$nr		= (int)mysql_num_rows($res);
				
				if($nr	=== 1){
					$this->setCodigoConteudo($row[0]);
					$this->setCodigoUsuario($row[1]);
					$this->setCodigoDisciplina($row[2]);
					$this->setCodigoMateria($row[3]);
					$this->setTituloConteudo($row[4]);
					$this->setDataConteudo($row[5]);
					$this->setArquivoConteudo($row[6]);
					return true;
				} else {
					return false;
				}
				
			} else {
				return false;
			}
		}
		
		public function buscarArquivoConteudo($codigoConteudo){
			$query	= "	SELECT 	codigoConteudo, codigoUsuario, codigoDisciplina, codigoMateria, tituloConteudo, dataConteudo, arquivoConteudo
						FROM	Conteudos
						WHERE	codigoConteudo = "	.	$codigoConteudo;
			
			$res	= mysql_query($query) or die(mysql_error());
			$nr		= (int)mysql_num_rows($res);
			
			if($nr === 0){
				return false;
			} else {
				return $res;
			}			
						
		}
		
		public function listarConteudo(){
			$query	= "	SELECT 		c.codigoConteudo, c.codigoUsuario, c.codigoDisciplina, c.codigoMateria, c.tituloConteudo, c.dataConteudo, c.arquivoConteudo, 
									u.loginUsuario,
									d.nomeDisciplina,
									m.nomeMateria
						FROM		Conteudos c
						INNER JOIN	Usuarios u 		ON 	u.codigoUsuario 	= c.codigoUsuario
						INNER JOIN	Disciplinas d	ON	d.codigoDisciplina	= c.codigoDisciplina
						LEFT OUTER JOIN	Materias m		ON 	m.codigoMateria		= c.codigoMateria
						ORDER BY 	c.codigoMateria DESC ";
			
			$res	= mysql_query($query) or die(mysql_error());
			$nr		= (int)mysql_num_rows($res);
			
			if($nr === 0){
				return false;
			} else {
				return $res;
			}
			
		}
		
		public function excluirConteudo($codigoConteudo){
			$query	= "	DELETE FROM Conteudos
						WHERE codigoConteudo = "	.	$codigoConteudo;
			
			return mysql_query($query) or die(mysql_error());
		}
		
		public function alterarConteudo($codigoConteudo){
			$query	= "	UPDATE 	Conteudos
						SET		codigoDisciplina	= '"	.	$this->getCodigoDisciplina()	.	"',
								codigoMateria		= '"	.	$this->getCodigoMateria()		.	"',
								tituloConteudo		= '"	.	$this->getTituloConteudo()		.	"',
								arquivoConteudo		= '"	.	$this->getArquivoConteudo()		.	"'
						WHERE	codigoConteudo		= "		.	$codigoConteudo;
						
			return mysql_query($query) or die(mysql_error());
		
		}
		
		//********************* BUSCAS DE FK's *********************
		public function listarDisciplina(){
			$query	= "	SELECT 		codigoDisciplina, nomeDisciplina
						FROM		Disciplinas
						ORDER BY	codigoDisciplina";
						
			$res	= mysql_query($query) or die(mysql_error());
			$nr				= (int)mysql_num_rows($res);
			
			if($nr === 0){
				return false;
			} else {
				return $res;
			}
		}
		
		public function buscarDisciplina($codigoDisciplina){
			$query	= "	SELECT 		codigoDisciplina, nomeDisciplina
						FROM		Disciplinas
						WHERE		codigoDisciplina	= "	. $codigoDisciplina;
						
			$res	= mysql_query($query) or die(mysql_error());
			return $res;
		}
		
		public function buscarUsuario($codigoUsuario){
			$query	= "	SELECT 		codigoUsuario, loginUsuario
						FROM		Usuarios
						WHERE		codigoUsuario	= "	. $codigoUsuario;
						
			$res	= mysql_query($query) or die(mysql_error());
			$array	= mysql_fetch_array($res);
			
			
			return $loginUsuario = $array['loginUsuario'];
		}
		
		public function listarMateria(){
			$query	= "	SELECT 		codigoMateria, nomeMateria
						FROM		Materias
						ORDER BY	codigoMateria";
						
			$res	= mysql_query($query) or die(mysql_error());
			$nr			= (int)mysql_num_rows($res);
			
			if($nr === 0){
				return false;
			} else {
				return $res;
			}
		}
		
		public function listarProfessor(){
			$query	= "	SELECT 		codigoUsuario, loginUsuario, acessoUsuario
						FROM		Usuarios
						WHERE		acessoUsuario = 'p'
						ORDER BY	codigoUsuario";
						
			$res	= mysql_query($query) or die(mysql_error());
			$nr			= (int)mysql_num_rows($res);
			
			if($nr === 0){
				return false;
			} else {
				return $res;
			}
		}
		
		//********************* BUSCAS AVANCADAS *********************
		public function buscaAvancadaDisciplina($codigoDisciplina = null){
			
			if($codigoDisciplina == null){
				$condicao = "ORDER BY c.tituloConteudo";
			} else {
				$condicao = "	WHERE		c.codigoDisciplina	= " . $codigoDisciplina."
								ORDER BY c.tituloConteudo";
			}
		
		
			$query	= "	SELECT 		c.codigoConteudo, c.codigoUsuario, c.codigoDisciplina, c.codigoMateria, c.tituloConteudo, c.dataConteudo, c.arquivoConteudo, 
									u.loginUsuario,
									d.nomeDisciplina,
									m.nomeMateria
						FROM		Conteudos c
						INNER JOIN	Usuarios u 		ON 	u.codigoUsuario 	= c.codigoUsuario
						INNER JOIN	Disciplinas d	ON	d.codigoDisciplina	= c.codigoDisciplina
						LEFT OUTER JOIN	Materias m		ON 	m.codigoMateria		= c.codigoMateria ".$condicao;
			
			$res	= mysql_query($query) or die(mysql_error());
			$nr		= (int)mysql_num_rows($res);
			
			if($nr === 0){
				return false;
			} else {
				return $res;
			}
			
		}
		
		public function buscaAvancadaMateria($codigoMateria = null){
			
			if($codigoMateria == null){
				$condicao = "ORDER BY c.tituloConteudo";
			} else {
				$condicao = "	WHERE		c.codigoMateria	= " . $codigoMateria."
								ORDER BY c.tituloConteudo";
			}
		
		
			$query	= "	SELECT 		c.codigoConteudo, c.codigoUsuario, c.codigoDisciplina, c.codigoMateria, c.tituloConteudo, c.dataConteudo, c.arquivoConteudo, 
									u.loginUsuario,
									d.nomeDisciplina,
									m.nomeMateria
						FROM		Conteudos c
						INNER JOIN	Usuarios u 		ON 	u.codigoUsuario 	= c.codigoUsuario
						INNER JOIN	Disciplinas d	ON	d.codigoDisciplina	= c.codigoDisciplina
						LEFT OUTER JOIN	Materias m		ON 	m.codigoMateria		= c.codigoMateria ".$condicao;
			
			$res	= mysql_query($query) or die(mysql_error());
			$nr		= (int)mysql_num_rows($res);
			
			if($nr === 0){
				return false;
			} else {
				return $res;
			}
	
		}
		
		public function buscaAvancadaUsuario($codigoUsuario = null){
			
			if($codigoUsuario == null){
				$condicao = "ORDER BY c.tituloConteudo";
			} else {
				$condicao = "	WHERE		c.codigoUsuario	= " . $codigoUsuario."
								ORDER BY c.tituloConteudo";
			}
		
		
			$query	= "	SELECT 		c.codigoConteudo, c.codigoUsuario, c.codigoDisciplina, c.codigoMateria, c.tituloConteudo, c.dataConteudo, c.arquivoConteudo, 
									u.loginUsuario,
									d.nomeDisciplina,
									m.nomeMateria
						FROM		Conteudos c
						INNER JOIN	Usuarios u 		ON 	u.codigoUsuario 	= c.codigoUsuario
						INNER JOIN	Disciplinas d	ON	d.codigoDisciplina	= c.codigoDisciplina
						LEFT OUTER JOIN	Materias m		ON 	m.codigoMateria		= c.codigoMateria ".$condicao;
			
			$res	= mysql_query($query) or die(mysql_error());
			$nr		= (int)mysql_num_rows($res);
			
			if($nr === 0){
				return false;
			} else {
				return $res;
			}
	
		}
		
		
		
	}
?>