<?php
function conectar($esRemota)
	{
		//Variable que almacena la IP de mi Gestor de BD.
		if($esRemota)
		{
			$servidor = "bdzapatos.cnpeguthatit.eu-west-3.rds.amazonaws.com";
			$usuario = "root";
			$password = "Tenerife0031";
			$bd = "Tienda_Zapatos";
		}
		else
		{
			$servidor = "bdzapatos.cnpeguthatit.eu-west-3.rds.amazonaws.com";
			$usuario = "root";
			$password = "Tenerife0031";
			$bd = "Tienda_Zapatos";
		}
		$conector = mysqli_connect($servidor, $usuario, $password, $bd);
		$cone = new mysqli('bdzapatos.cnpeguthatit.eu-west-3.rds.amazonaws.com', 'root', 'Tenerife0031', 'Tienda_Zapatos') or die(mysqli_error());	
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