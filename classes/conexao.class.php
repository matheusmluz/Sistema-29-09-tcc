<?php ob_start();
	class Conexao {

		protected $id;
		protected $con;

		function __construct() {
			$local			= "localhost"; 
			$dbname			= "matheusmluz_tcc";
			$usuario		= "root";
			$password		= ""; 

			//1º passo - Conecta ao servidor MySQL
			$id = mysql_connect($local, $usuario, $password);
						
			//2º passo - Seleciona o Banco de Dados
			$con = mysql_select_db($dbname, $id);
			
		}
	}
?>