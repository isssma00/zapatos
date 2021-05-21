<!-- eliminar fila -->
<?php
session_start();
if(!isset($_POST["idUsuario"])) exit();
$idUsuario = $_POST["idUsuario"];
include_once "./bd/base_de_datos.php";
$sentencia = $base_de_datos->prepare("DELETE FROM usuario WHERE idUsuario = ?;");
$resultado = $sentencia->execute([$idUsuario]);
if($_SESSION['Rol']=="Admin"){
	if($resultado === TRUE){
		header("Location: ./listar.php");
		exit;
	}
}else if($_SESSION['Rol']=="Usuario"){
	if($resultado === TRUE){
		header("Location: desloguear_usuario.php");
		exit;
	}
}else echo "Algo salió mal";
?>