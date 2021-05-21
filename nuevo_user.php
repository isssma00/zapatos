<!DOCTYPE html>
<html lang="en">
<head>
  <title>MUNDO ZAPAS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="./css/estilos.css" rel="stylesheet" type="text/css">
</head>
<body>

<div class="jumbotron">
  <div class="container text-center">
    <br><br/>
    <br><br/>
    <br><br/>
    <br><br/>
    <br><br/>
  </div>
</div>

<?php include_once "cabecera.php"?>

<?php
//Salir si alguno de los datos no está presente
if(!isset($_POST["Usuario"]) || !isset($_POST["Password"]) || !isset($_POST["Nombre"]) || !isset($_POST["Apellido1"]) || !isset($_POST["Apellido2"]) || !isset($_POST["Telefono"]) || !isset($_POST["Email"]) || !isset($_POST["CP"]) || !isset($_POST["Provincia"]) || !isset($_POST["ComunidadAutonoma"]) || !isset($_POST["Rol"]) || !isset($_POST["Dni"]) ) exit();

//Si todo va bien, se ejecuta esta parte del código...

include_once "./bd/base_de_datos.php";
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
$Rol = $_POST["Rol"];
$Dni = $_POST["Dni"];

$sentencia = $base_de_datos->prepare("INSERT INTO usuario(Usuario, Password, Nombre, Apellido1, Apellido2, Telefono, Email, Direccion, CP, Provincia, ComunidadAutonoma, Rol, Dni) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$Usuario, $Password, $Nombre, $Apellido1, $Apellido2, $Telefono, $Email, $Direccion, $CP, $Provincia, $ComunidadAutonoma, $Rol, $Dni]);

if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";


?>
  <?php include_once "footer.php"?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
