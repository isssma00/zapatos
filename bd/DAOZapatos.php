<?php
	function consultaZapatos($conexion)
	{
		$consulta = "SELECT idZapatos, Imagen FROM zapatos ORDER BY rand() LIMIT 4";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

?>