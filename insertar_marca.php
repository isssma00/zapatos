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
  <li class="active">Nueva marca</li>        
</ol>
<!-- Formulario de registro de usuarios desde panel -->
<div class="container-fluid bg-3">
	<h1>Nueva marca</h1>
  <form method="post" action="nuevo_marca.php">
		<label for="Nombre">Nombre:</label>
		<input class="form-control" name="Nombre" required type="text" id="Nombre" placeholder="Nombre">

		<label for="Fundacion">Fundacion:</label>
		<input class="form-control" name="Fundacion" required type="date" id="Fundacion" placeholder="Fundacion">
   
    <label for="Descripcion">Descripcion:</label>
    <input class="form-control" name="Descripcion" required type="text" id="Descripcion" placeholder="Descripcion">

    <label for="Logo">Logo:</label>
    <input class="form-control" name="Logo" required type="file" id="Logo" placeholder="Logo">

    <br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div><br>

<?php include_once "footer.php"?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
