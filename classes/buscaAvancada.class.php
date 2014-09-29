<?php

	class BuscaAvancada {
		
		public function buscaGeral() {
			$query	= "	SELECT 	d.codigoDisciplina, d.nomeDisciplina, m.codigoMateria, m.nomeMateria, u.codigoUsuario, u.loginUsuario
						FROM	Disciplinas d, Materias m, Usuarios u";
						
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