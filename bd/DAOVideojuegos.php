<?php
	function consultaVideojuego($conexion)
	{
		$consulta = "SELECT idVideojuego, Imagen FROM Videojuego ORDER BY rand() LIMIT 4";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

?>