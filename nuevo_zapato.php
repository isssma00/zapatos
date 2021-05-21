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
if(!isset($_POST["Nombre"]) || !isset($_POST["Lanzamiento"]) || !isset($_POST["Descripcion"]) || !isset($_POST["Imagen"]) || !isset($_POST["Precio"])) exit();

//Si todo va bien, se ejecuta esta parte del código...

include_once "./bd/base_de_datos.php";
$Nombre = $_POST["Nombre"];
$Precio = $_POST["Precio"];
$Lanzamiento = $_POST["Lanzamiento"];
$Descripcion = $_POST["Descripcion"];
$Imagen = $_POST["Imagen"];
$Imagen2 = $_POST["Imagen2"];
$Imagen3 = $_POST["Imagen3"];
$IdSexo = $_POST["IdSexo"];
$IdMarca = $_POST["IdMarca"];

$sentencia = $base_de_datos->prepare("INSERT INTO zapatos(Nombre, IdSexo, IdMarca, Precio, Lanzamiento, Descripcion, Imagen, Imagen2, Imagen3) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);");
$resultado = $sentencia->execute([$Nombre, $IdSexo, $IdMarca, $Precio, $Lanzamiento, $Descripcion, $Imagen, $Imagen2, $Imagen3]);
$ultiID = $base_de_datos->lastInsertId();
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
