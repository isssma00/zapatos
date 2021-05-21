<?php

//Salir si alguno de los datos no está presente
if(
	!isset($_POST["Nombre"]) || 
	!isset($_POST["Fundacion"]) || 
	!isset($_POST["Descripcion"]) || 
	!isset($_POST["Logo"]) || 
	!isset($_POST["idMarca"])
){
	echo "ERROR: Falta algún dato a introducir";
	exit();
}
//Si todo va bien, se ejecuta la conexión y gaurdamos en variables los datos del post

include_once "./bd/base_de_datos.php";
$idMarca = $_POST["idMarca"];
$Nombre = $_POST["Nombre"];
$Fundacion = $_POST["Fundacion"];
$Descripcion = $_POST["Descripcion"];
$Logo = $_POST["Logo"];

$sentencia = $base_de_datos->prepare("UPDATE marca SET Nombre = ?, Fundacion = ?, Descripcion = ?, Logo = ? WHERE idMarca = ?;");
$resultado = $sentencia->execute([$Nombre, $Fundacion, $Descripcion, $Logo, $idMarca]);

if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";
?>