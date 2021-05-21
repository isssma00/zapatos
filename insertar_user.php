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
<!-- Formulario de registro de usuarios desde panel -->
<div class="container-fluid bg-3">
	<h1>Nuevo usuario</h1>
	<form method="post" action="nuevo_user.php">
		<label for="Usuario">Usuario:</label>
		<input class="form-control" name="Usuario" required type="text" id="Usuario" placeholder="Introduzca el usuario">

        <label for="Password">Password:</label>
		<input class="form-control" name="Password" required type="text" id="Password" placeholder="Introduzca contraseña">

		<label for="Nombre">Nombre:</label>
		<input class="form-control" name="Nombre" required type="text" id="Nombre" placeholder="Nombre">

		<label for="Apellido1">Apellido1:</label>
		<input class="form-control" name="Apellido1" required type="text" id="Apellido1" placeholder="Apellido1">
		
        <label for="Apellido2">Apellido2:</label>
		<input class="form-control" name="Apellido2" required type="text" id="Apellido2" placeholder="Apellido2">
        
        <label for="Telefono">Telefono:</label>
		<input class="form-control" name="Telefono" required type="number" id="Telefono" placeholder="Telefono">
        
        <label for="Email">Email:</label>
		<input class="form-control" name="Email" required type="email" id="Email" placeholder="Email">
    
    <label for="Direccion">Direccion:</label>
		<input class="form-control" name="Direccion" required type="text" id="Direccion" placeholder="Direccion">
    
    <label for="CP">CP:</label>
		<input class="form-control" name="CP" required type="number" id="CP" placeholder="CP">

        <label for="Provincia">Provincia:</label>
		<input class="form-control" name="Provincia" required type="text" id="Provincia" placeholder="Provincia">

        <label for="ComunidadAutonoma">ComunidadAutonoma:</label>
		<input class="form-control" name="ComunidadAutonoma" required type="text" id="ComunidadAutonoma" placeholder="ComunidadAutonoma">

        <label for="Rol">Rol:</label>
		<input class="form-control" name="Rol" required type="text" id="Rol" placeholder="Rol">
        
        <label for="Dni">Dni:</label>
		<input class="form-control" name="Dni" required type="text" id="Dni" placeholder="Dni">

        <br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div><br>

<?php include_once "footer.php"?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
