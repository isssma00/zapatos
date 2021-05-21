<!-- eliminar fila -->
<?php
if(!isset($_POST["idZapatos"])) exit();
$idZapatos = $_POST["idZapatos"];
include_once "./bd/base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM zapatos WHERE idZapatos = ?;");
$resultado = $sentencia->execute([$idZapatos]);
if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal";
?>