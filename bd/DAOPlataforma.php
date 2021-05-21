<?php
	function consultaPlataforma($conexion)
	{
		$consulta = "SELECT idPlataforma, Imagen FROM Plataforma ORDER BY rand() LIMIT 4";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

?>