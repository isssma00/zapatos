<?php

//Salir si alguno de los datos no está presente
if(
	!isset($_POST["IdZapatos"]) || 
	!isset($_POST["IdTallas"]) || 
	!isset($_POST["Stock"]) ||  
	!isset($_POST["idProductos"])
){
	echo "ERROR: Falta algún dato a introducir";
	exit();
}
//Si todo va bien, se ejecuta la conexión y gaurdamos en variables los datos del post

include_once "./bd/base_de_datos.php";
$idProductos = $_POST["idProductos"];
$IdZapatos = $_POST["IdZapatos"];
$IdTallas = $_POST["IdTallas"];
$Stock = $_POST["Stock"];

$sentencia = $base_de_datos->prepare("UPDATE productos SET IdZapatos = ?, IdTallas = ?, Stock = ? WHERE idProductos = ?;");
$resultado = $sentencia->execute([$IdZapatos, $IdTallas, $Stock, $idProductos]);

if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";
?>