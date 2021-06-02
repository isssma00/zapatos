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
  <li class="active">Editar usuario</li>        
</ol>
<!-- Si no existe el id salga de la pagina 
y conectamos a la base de datos y realizamos la consulta-->
<?php
if(!isset($_GET["idUsuario"])) exit();
$idUsuario = $_GET["idUsuario"];
include_once "./bd/base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM usuario WHERE idUsuario = ?;");
$sentencia->execute([$idUsuario]);
$usuario = $sentencia->fetch(PDO::FETCH_OBJ);
if($usuario === FALSE){
	echo "¡No existe algún producto con ese ID!";
	exit();
}

?>
<!-- Hacer un formulario que envie la informacion a un php encargado de actualizar datos -->
	<div class="container-fluid">
		<h1>Editar producto con el ID <?php echo $usuario->idUsuario; ?></h1>
		<form method="post" action="guardarDatosEditadosuser.php">
			<input type="hidden" name="idUsuario" value="<?php echo $usuario->idUsuario; ?>">
	
			<label for="Usuario">Usuario:</label>
			<input value="<?php echo $usuario->Usuario ?>" class="form-control" name="Usuario" required type="text" id="Usuario" placeholder="Usuario">

			<label for="Password">Password:</label>
			<input required id="Password" name="Password" class="form-control" value="<?php echo $usuario->Password ?>">

      <label for="Nombre">Nombre:</label>
			<input value="<?php echo $usuario->Nombre ?>" class="form-control" name="Nombre" required type="text" id="Nombre" placeholder="Nombre">

      <label for="Apellido1">Apellido1:</label>
			<input value="<?php echo $usuario->Apellido1 ?>" class="form-control" name="Apellido1" required type="text" id="Apellido1" placeholder="Apellido1">
      
      <label for="Apellido2">Apellido2:</label>
			<input value="<?php echo $usuario->Apellido2 ?>" class="form-control" name="Apellido2" required type="text" id="Apellido2" placeholder="Apellido2">
      
      <label for="Telefono">Telefono:</label>
			<input value="<?php echo $usuario->Telefono ?>" class="form-control" name="Telefono" required type="number" id="Telefono" placeholder="Telefono">
      
      <label for="Email">Email:</label>
			<input value="<?php echo $usuario->Email ?>" class="form-control" name="Email" required type="email" id="Email" placeholder="Email">
      
      <label for="Direccion">Direccion:</label>
			<input value="<?php echo $usuario->Direccion ?>" class="form-control" name="Direccion" required type="text" id="Direccion" placeholder="Direccion">

      <label for="CP">Codigo Postal:</label>
			<input value="<?php echo $usuario->CP ?>" class="form-control" name="CP" required type="number" id="CP" placeholder="CP">
      
      <label for="Provincia">Provincia:</label>
			<input value="<?php echo $usuario->Provincia ?>" class="form-control" name="Provincia" required type="text" id="Provincia" placeholder="Provincia">
      
      <label for="ComunidadAutonoma">Comunidad Autonoma:</label>
			<input value="<?php echo $usuario->ComunidadAutonoma ?>" class="form-control" name="ComunidadAutonoma" required type="text" id="ComunidadAutonoma" placeholder="ComunidadAutonoma">
      
      <label for="Dni">Dni:</label>
			<input value="<?php echo $usuario->Dni ?>" class="form-control" name="Dni" required type="text" id="Dni" placeholder="Dni">
      <?php  if($_SESSION['Rol']=="Admin"){  ?>
			<label for="Rol">Rol:</label>
			<input value="<?php echo $usuario->Rol ?>" class="form-control" name="Rol" required type="text" id="Rol" placeholder="Usuario o Admin">
      <?php } ?>
			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="./listar.php">Cancelar</a>
		</form>
	</div><br>
  <?php include_once "footer.php"?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
