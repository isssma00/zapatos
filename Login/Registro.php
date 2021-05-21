<?php

  require "../bd/Conector_BD.php";
  require "../bd/DAOUsuario.php";
  //Recogemos los valores del formulario.
  $usuario = $_POST["usuario"];
  $password = $_POST["password"];
  $nombre = $_POST["nombre"];
  $apellido1 = $_POST["apellido1"];
  $apellido2 = $_POST["apellido2"];
  $telefono = $_POST["telefono"];
  $correo = $_POST["correo"];
  $direccion = $_POST["direccion"];
  $CP = $_POST["CP"];
  $provincia = $_POST["provincia"];
  $comunidad = $_POST["comunidad"];
  $DNI = $_POST["DNI"];
  $Rol = "Usuario";
  //Creamos la conexión a la BD.
  $conexion = conectar(false);
  //Lanzamos la consulta.
  $insertar = insertarUsuarios($conexion, $usuario, $password, $nombre, $apellido1, $apellido2, $telefono, $correo, $direccion, $CP, $provincia, $comunidad, $DNI, $ROL);
    echo "Usuario Creado correctamente. Veamos los datos del usuario. <br>";
    header("Location: ./Login.html");
?>