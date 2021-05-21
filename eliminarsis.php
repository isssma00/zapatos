<!-- eliminar fila -->
<?php
if(!isset($_POST["idSistema"])) exit();
$idSistema = $_POST["idSistema"];
include_once "./bd/base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM sistema WHERE idSistema = ?;");
$resultado = $sentencia->execute([$idSistema]);
if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal";
?>