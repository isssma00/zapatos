<?php
session_start();
//Salir si alguno de los datos no está presente
if(
	!isset($_POST["Usuario"]) || 
	!isset($_POST["Password"]) ||
	!isset($_POST["Nombre"]) ||
	!isset($_POST["Apellido1"]) || 
	!isset($_POST["Apellido2"]) ||
	!isset($_POST["Telefono"]) ||
	!isset($_POST["Email"]) ||
	!isset($_POST["Direccion"]) ||
	!isset($_POST["CP"]) ||
	!isset($_POST["Provincia"]) ||
	!isset($_POST["ComunidadAutonoma"]) ||
	!isset($_POST["Dni"]) || 
	!isset($_POST["idUsuario"])
) exit();

//Si todo va bien, se ejecuta la conexión y gaurdamos en variables los datos del post

include_once "./bd/base_de_datos.php";

if($_SESSION['Rol']=="Admin") {
	$idUsuario = $_POST["idUsuario"];
	$Usuario = $_POST["Usuario"];
	$Password = $_POST["Password"];
	$Nombre = $_POST["Nombre"];
	$Apellido1 = $_POST["Apellido1"];
	$Apellido2 = $_POST["Apellido2"];
	$Telefono = $_POST["Telefono"];
	$Email = $_POST["Email"];
	$Direccion = $_POST["Direccion"];
	$CP = $_POST["CP"];
	$Provincia = $_POST["Provincia"];
	$ComunidadAutonoma = $_POST["ComunidadAutonoma"];
	$Dni = $_POST["Dni"];
	$Rol = $_POST["Rol"];


	$sentencia = $base_de_datos->prepare("UPDATE usuario SET Usuario = ?, Password = ?,  Nombre = ?, Apellido1 = ?, Apellido2 = ?, Telefono = ?, Email = ?, Direccion = ?, CP = ?, Provincia = ?, ComunidadAutonoma = ?, Dni = ?,Rol = ? WHERE idUsuario = ?;");
	$resultado = $sentencia->execute([$Usuario, $Password, $Nombre, $Apellido1, $Apellido2, $Telefono, $Email, $Direccion, $CP, $Provincia, $ComunidadAutonoma, $Dni, $Rol, $idUsuario]);
	if($resultado === TRUE){
		header("Location: ./listar.php");
		exit;
	}
	else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";
} else if($_SESSION['Rol']=="Usuario") {
	$idUsuario = $_POST["idUsuario"];
	$Usuario = $_POST["Usuario"];
	$Password = $_POST["Password"];
	$Nombre = $_POST["Nombre"];
	$Apellido1 = $_POST["Apellido1"];
	$Apellido2 = $_POST["Apellido2"];
	$Telefono = $_POST["Telefono"];
	$Email = $_POST["Email"];
	$Direccion = $_POST["Direccion"];
	$CP = $_POST["CP"];
	$Provincia = $_POST["Provincia"];
	$ComunidadAutonoma = $_POST["ComunidadAutonoma"];
	$Dni = $_POST["Dni"];



	$sentencia = $base_de_datos->prepare("UPDATE usuario SET Usuario = ?, Password = ?,  Nombre = ?, Apellido1 = ?, Apellido2 = ?, Telefono = ?, Email = ?, CP = ?, Provincia = ?, ComunidadAutonoma = ?, Dni = ? WHERE idUsuario = ?;");
	$resultado = $sentencia->execute([$Usuario, $Password, $Nombre, $Apellido1, $Apellido2, $Telefono, $Email, $CP, $Provincia, $ComunidadAutonoma, $Dni, $idUsuario]);
	if($resultado === TRUE){
		header("Location: ./ajuste_user.php");
		exit;
	}
	else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";
}
?>