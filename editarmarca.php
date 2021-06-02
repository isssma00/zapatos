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
<ol class="breadcrumb">
  <li><a href="home.php">Home</a></li>
  <li><a href="catalogo.php">Catalogo</a></li>
  <li><a href="catalogo.php">Administración</a></li>
  <li class="active">Editar marca</li>        
</ol>
<!-- Si no existe el id salga de la pagina 
y conectamos a la base de datos y realizamos la consulta-->
<?php
if(!isset($_GET["idMarca"])) exit();
$idMarca = $_GET["idMarca"];
include_once "./bd/base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM marca WHERE idMarca = ?;");
$sentencia->execute([$idMarca]);
$marca = $sentencia->fetch(PDO::FETCH_OBJ);
if($marca === FALSE){
	echo "¡No existe algún producto con ese ID!";
	exit();
}

?>
<!-- Hacer un formulario que envie la informacion a un php encargado de actualizar datos -->
	<div class="container-fluid">
		<h1>Editar producto con el ID <?php echo $marca->idMarca; ?></h1>
		<form method="post" action="guardarDatosEditadosmarca.php">
			<input type="hidden" name="idMarca" value="<?php echo $marca->idMarca; ?>">

      <label for="Nombre">Nombre:</label>
			<input value="<?php echo $marca->Nombre ?>" class="form-control" name="Nombre" required type="text" id="Nombre" placeholder="Nombre">

      <label for="Fundacion">Fundacion:</label>
			<input value="<?php echo $marca->Fundacion ?>" class="form-control" name="Fundacion" required type="date" id="Fundacion" placeholder="Fundacion">
      
      <label for="Descripcion">Descripcion:</label>
			<input value="<?php echo $marca->Descripcion ?>" class="form-control" name="Descripcion" required type="text" id="Descripcion" placeholder="Descripcion">
      
      <label for="Logo">Logo:</label>
			<input value="<?php echo $marca->Logo ?>" class="form-control" name="Logo" required type="file" id="Logo" placeholder="Logo">

			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="./listar.php">Cancelar</a>
		</form>
	</div><br>
  <?php include_once "footer.php"?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
