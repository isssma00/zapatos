<?php
	function consultarUsuarios($conexion, $usuario){
		$consulta = "SELECT * FROM usuario WHERE usuario = '$usuario'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}
	function consultaLogin($conexion, $usuario, $password){
		$consulta = "SELECT * FROM usuario WHERE usuario = '$usuario' AND Password = '$password'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}
	function insertarUsuarios($conexion, $usuario, $password, $nombre, $apellido1, $apellido2, $telefono, $correo, $direccion, $CP, $provincia, $comunidad, $DNI, $ROL)
	{
        $sql = "INSERT INTO usuario (Usuario, Password, Nombre, Apellido1, Apellido2, Telefono, Email, Direccion, CP, Provincia, ComunidadAutonoma, Dni, Rol) VALUES ('$usuario','$password','$nombre','$apellido1','$apellido2','$telefono','$correo','$direccion','$CP','$provincia','$comunidad','$DNI','Usuario')";

            if (mysqli_query($conexion, $sql)) {
               echo "Registro ingresado correctamente";
            } else {
               echo "Error: " . $sql . "" . mysqli_error($conexion);
            }
            $conexion->close();
	}

	function consultaNueva($conexion, $Dni, $password)
	{
		$consulta = "SELECT * FROM Usuario WHERE Dni = '$Dni' AND Password = '$password'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	function mostrarPerfil($conexion, $idUsuario)
	{
		$consulta = "SELECT * FROM Usuario WHERE(`idUsuario` = '$idUsuario')";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
    }

	function consultaDni($conexion, $Dni)
	{
		$consulta = "SELECT * FROM Usuario WHERE Dni = '$Dni'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	function crearSesion($usuario){
		//Pongo el ID de "SESSION" con el DNI.
		session_id($usuario['Dni']);
		//Creo la sesión.
		session_start();
		//Almacenamos todos los datos de la sesión.
		$_SESSION['idUsuario'] = $usuario['idUsuario'];
		$_SESSION['Usuario'] = $usuario['Usuario'];
		$_SESSION['Password'] = $usuario['Password'];
		$_SESSION['Nombre'] = $usuario['Nombre'];
		$_SESSION['Apellido1'] = $usuario['Apellido1'];
		$_SESSION['Apellido2'] = $usuario['Apellido2'];
		$_SESSION['Email'] = $usuario['Email'];
		$_SESSION['Dni'] = $usuario['Dni'];
		$_SESSION['Rol'] = $usuario['Rol'];
		$_SESSION['Direccion'] = $usuario['Direccion'];
	}

?>