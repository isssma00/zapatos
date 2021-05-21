<!-- eliminar fila -->
<?php
if(!isset($_POST["idMarca"])) exit();
$idMarca = $_POST["idMarca"];
include_once "./bd/base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM marca WHERE idMarca = ?;");
$resultado = $sentencia->execute([$idMarca]);
if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal";
?>