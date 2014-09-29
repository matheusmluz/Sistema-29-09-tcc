<?php
	class Materia {
		private $codigoMateria;
		private $nomeMateria;
		
		//********************* CONSTRUCT *********************
		public function __Construct($codigoMateria, $nomeMateria){
			$this->setCodigoMateria($codigoMateria);
			$this->setNomeMateria($nomeMateria);
		}
		
		//********************* SETS *********************
		public function setCodigoMateria($codigoMateria){
			$this->codigoMateria = $codigoMateria;
		}
		
		public function setNomeMateria($nomeMateria){
			$this->nomeMateria = $nomeMateria;
		}
		
		//********************* GETS *********************
		public function getCodigoMateria(){
			return $this->codigoMateria;
		}
		
		public function getNomeMateria(){
			return $this->nomeMateria;
		}
		
		//********************* MÉTODOS *********************
		public function incluirMateria(){
		
			//verifica se há um registro com mesmo código
			if(!$this->buscarMateria($this->getCodigoMateria())){
				$query	= "	INSERT INTO Materias (codigoMateria, nomeMateria)
							VALUES ('"	.	$this->getCodigoMateria()	."',
									'"	.	$this->getNomeMateria()		."');";
				return mysql_query($query) or die(mysql_error());
			} else {
				return false;
			}
		}
		
		public function buscarMateria($codigoMateria){
			$query	= "	SELECT	codigoMateria, nomeMateria
						FROM	Materias
						WHERE	codigoMateria = "	.	$codigoMateria;
			
			//se for executado
			if($res = mysql_query($query)){
				$row	= mysql_fetch_row($res);
				$nr		= (int)mysql_num_rows($res);
				
				#se houver registro povoa o obj, senão retorna falso
				if($nr === 1){
					$this->setCodigoMateria($row[0]);
					$this->setNomeMateria($row[1]);
					return true;
				} else {
					return false;
				}
				
			} else {
				return false;
			}
		}
		
		public function listarMateria(){
			$query	= "	SELECT 		codigoMateria, nomeMateria
						FROM		Materias
						ORDER BY	codigoMateria";
			$res	= mysql_query($query) or die(mysql_error());
			$nr		= (int)mysql_num_rows($res);
			
			//verifica se há registro
			if($nr === 0){
				return false;
			} else {
				return $res;
			}
		}
		
		public function excluirMateria($codigoMateria){
			$query	= "	DELETE FROM Materias
						WHERE		codigoMateria = "	.	$codigoMateria;
			return mysql_query($query) or die(mysql_error());
		}
		
		public function alterarMateria($codigoMateria){
			$query	= "	UPDATE 	Materias
						SET		nomeMateria = '"	.	$this->getNomeMateria()	."'
						WHERE	codigoMateria = "	.	$codigoMateria;
			return mysql_query($query) or die(mysql_error());
		}
		
		//********************* TESTES FKs *********************
		public function testeFkConteudo($codigoMateria) {
			$query = "	SELECT codigoConteudo, codigoMateria
						FROM Conteudos
						WHERE codigoMateria =".$codigoMateria;
			$res = mysql_query($query) or die(mysql_error());
			
			$nr = (int)mysql_num_rows($res);
			
			if ($nr === 0) {
				return true;
			} else {
				return false;
			}
		}
	}
?>