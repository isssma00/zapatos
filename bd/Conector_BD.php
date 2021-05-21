<?php
function conectar($esRemota)
	{
		//Variable que almacena la IP de mi Gestor de BD.
		if($esRemota)
		{
			$servidor = "localhost:3306";
			$usuario = "root";
			$password = "Alumn@2020";
			$bd = "Tienda_Zapatos";
		}
		else
		{
			$servidor = "localhost:3306";
			$usuario = "root";
			$password = "Alumn@2020";
			$bd = "Tienda_Zapatos";
		}
		$conector = mysqli_connect($servidor, $usuario, $password, $bd);
		$cone = new mysqli('localhost', 'root', 'Alumn@2020', 'Tienda_Zapatos') or die(mysqli_error());	
		if($conector)
		{
			return $conector;
		}
		else
		{
			echo "ERROR: No se ha podido conectar con la BD. <br>";
			//Función que me indica el error cometido al conectar.
			echo mysqli_connect_error();
		}
	}
?>