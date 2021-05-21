<?php

//Salir si alguno de los datos no está presente
if(
	!isset($_POST["Nombre"]) || 
	!isset($_POST["IdSexo"]) || 
	!isset($_POST["IdMarca"]) ||
	!isset($_POST["Precio"]) || 
	!isset($_POST["Lanzamiento"]) || 
	!isset($_POST["Descripcion"]) || 
	!isset($_POST["Imagen"]) ||
	!isset($_POST["Imagen2"]) ||
	!isset($_POST["Imagen3"]) || 
	!isset($_POST["idZapatos"])
){
	echo "ERROR: Falta algún dato a introducir";
	exit();
}
//Si todo va bien, se ejecuta la conexión y gaurdamos en variables los datos del post

include_once "./bd/base_de_datos.php";
$idZapatos = $_POST["idZapatos"];
$Nombre = $_POST["Nombre"];
$IdSexo = $_POST["IdSexo"];
$IdMarca = $_POST["IdMarca"];
$Precio = $_POST["Precio"];
$Lanzamiento = $_POST["Lanzamiento"];
$Descripcion = $_POST["Descripcion"];
$Imagen = $_POST["Imagen"];
$Imagen2 = $_POST["Imagen2"];
$Imagen3 = $_POST["Imagen3"];

$sentencia = $base_de_datos->prepare("UPDATE zapatos SET Nombre = ?, IdSexo = ?, IdMarca = ?, Precio = ?, Lanzamiento = ?, Descripcion = ?, Imagen = ?, Imagen2 = ?, Imagen3 = ? WHERE idZapatos = ?;");
$resultado = $sentencia->execute([$Nombre, $IdSexo, $IdMarca, $Precio, $Lanzamiento, $Descripcion, $Imagen, $Imagen2, $Imagen3, $idZapatos]);

if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";
?>