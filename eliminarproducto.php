<!-- eliminar fila -->
<?php
if(!isset($_POST["idProductos"])) exit();
$idProductos = $_POST["idProductos"];
include_once "./bd/base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM productos WHERE idProductos = ?;");
$resultado = $sentencia->execute([$idProductos]);
if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal";
?>