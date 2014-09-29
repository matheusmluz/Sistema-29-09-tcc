<?php
	class Upload {
		private $caminho	= "uploads/";	#para onde os uploads irão
		private	$tamanho	= 128000000;		#tamanho (128MB);
		private $extensao	= array('zip', 'pdf');
		
		//********************* UPAR *********************
		public function upar($nome , $tamanho , $nomeTemporario , $tipo) {
			if($this->verificarTamanho($nome , $tamanho , $nomeTemporario , $tipo)) {
				
				$arquivoConteudo = $this->caminho.$nome;
				
				return $arquivoConteudo;
			} else {
				return false;
			}
			
		}
		
		//********************* VERIFICAR TAMANHO *********************
		public function verificarTamanho($nome , $tamanho , $nomeTemporario , $tipo) {
			
			if($tamanho > $this->tamanho){
				return false;
			} else {
				if($this->verificarExtensao($nome , $tamanho , $nomeTemporario , $tipo)){
					move_uploaded_file($nomeTemporario, $this->caminho.$nome);
					return true;
				} else {
					echo "extensao invalida!";
					return false;
				}
			}
		}
		
		//********************* VERIFICAR  TIPO *********************
		public function verificarExtensao($nome , $tamanho , $nomeTemporario , $tipo) {
			$extensaoArquivo['extensao']	= explode('.',$nome);
			if(in_array($extensaoArquivo['extensao'][1] , $this->extensao)){
				return true;
			}else{
				return false;
			}		
		
		}
		
		//********************* EXCLUIR *********************
		public function excluirArquivo($codigoConteudo){
			
			$query	= "	SELECT 	codigoConteudo, arquivoConteudo
						FROM	Conteudos
						WHERE	codigoConteudo = " . $codigoConteudo;
			$res	= mysql_query($query) or die(mysql_error());
			
			$array	= mysql_fetch_array($res);
			
			if(file_exists($array['arquivoConteudo'])){
				unlink($array['arquivoConteudo']);
				return true;
			} else {
				return false;
			}
			
			//return true;
		}
	}

?>