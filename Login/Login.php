<?php
session_start();
	//Traernos los ficheros que necesitemos.
	require "../bd/Conector_BD.php";
	require "../bd/DAOUsuario.php";
	//Recogemos los valores del formulario.
	$usuario = $_POST["usuario"];
	$password = $_POST["password"];
	//Creamos la conexión a la BD.
	$conexion = conectar(false);
	//Lanzamos la consulta.
	$consulta = consultaLogin($conexion, $usuario, $password);
	$user = consultarUsuarios($conexion, $usuario);
	if(mysqli_num_rows($consulta) == 1)
	{
		$fila = mysqli_fetch_assoc($consulta);
		//Creo la sesión del usuario.
		crearSesion($fila);
		header("Location: ../catalogo.php");
	}
	else if (mysqli_num_rows($user) == 1) {
		//$_SESSION['Error']="La contraseña es incorrecta";
		//header("Location: ./Login.html");
		echo'La contraseña es incorrecta';
		echo'<a href="./Login.html">Iniciar sesión.</a>';
	}else
	{
		//$_SESSION['Error']="El usuario es incorrecto";
		//header("Location: ./Login.html");
		echo'El usuario es incorrecto';
		echo'<a href="./Registro.html">Crear nueva cuenta.</a>';
	}
?>