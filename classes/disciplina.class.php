<?php
	class Disciplina {
		private $codigoDisciplina;
		private $nomeDisciplina;
		
		//********************* CONSTRUCT *********************
		public function __Construct($codigoDisciplina, $nomeDisciplina){
			$this->setCodigoDisciplina($codigoDisciplina);
			$this->setNomeDisciplina($nomeDisciplina);
		}
		
		//********************* SETS *********************
		public function setCodigoDisciplina($codigoDisciplina){
			$this->codigoDisciplina = $codigoDisciplina;
		}
		
		public function setNomeDisciplina($nomeDisciplina){
			$this->nomeDisciplina = $nomeDisciplina;
		}
		
		//********************* GETS ********************* 
		public function getCodigoDisciplina() {
			return $this->codigoDisciplina;
		}
		
		public function getNomeDisciplina(){
			return $this->nomeDisciplina;
		}
		
		//********************* MÉTODOS *********************
		
		//Incluir disciplina
		public function incluirDisciplina(){
			if(!$this->buscarDisciplina($this->getCodigoDisciplina())){
				$query = "	INSERT INTO Disciplinas (codigoDisciplina, nomeDisciplina)
							VALUES ('"	.	$this->getCodigoDisciplina()	.	"',
									'"	.	$this->getNomeDisciplina()		.	"')";
				return mysql_query($query) or die(mysql_error());
			} else {
				return false;
			}
		}
		
		public function buscarDisciplina($codigoDisciplina){
			$query = "	SELECT 	codigoDisciplina, nomeDisciplina
						FROM	Disciplinas
						WHERE	codigoDisciplina = "	.	$codigoDisciplina;
			
			#se for executado
			if($res = mysql_query($query)){ 
				$row 	= mysql_fetch_row($res);
				$nr		= (int)mysql_num_rows($res);
				
				#se há apenas 1 linha de registro encontrado
				if ($nr === 1) { 
					$this->setCodigoDisciplina($row[0]);
					$this->setNomeDisciplina($row[1]);
					return true;
				} else {
					return false;
				}
				
			} else {
				return false;
			}	
		}
		
		public function listarDisciplina(){
			$query = "	SELECT 	codigoDisciplina, nomeDisciplina
						FROM	Disciplinas
						ORDER BY codigoDisciplina";
						
			$res	= mysql_query($query) or die(mysql_error());
			
			//verifica numero de registros
			$nr		= (int)mysql_num_rows($res);
			
			//se nao houver retorn falso, senão retorna o resultSet
			if($nr === 0){
				return false;
			} else {
				return $res;
			}
		}
		
		public function excluirDisciplina($codigoDisciplina){
			$query	= "	DELETE FROM Disciplinas
						WHERE codigoDisciplina ="	.	$codigoDisciplina;
			return mysql_query($query) or die(mysql_error());
		}
		
		public function alterarDisciplina($codigoDisciplina){
			$query	= "	UPDATE 	Disciplinas
						SET		nomeDisciplina		= '"	.	$this->getNomeDisciplina()	.	"'
						WHERE	codigoDisciplina	= "		.	$codigoDisciplina;
			return mysql_query($query) or die(mysql_error());
		}
		
		//********************* TESTES FKs *********************
		public function testeFkConteudo($codigoDisciplina) {
			$query = "	SELECT codigoConteudo, codigoDisciplina
						FROM Conteudos
						WHERE codigoDisciplina =".$codigoDisciplina;
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