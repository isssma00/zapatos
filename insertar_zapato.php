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
include_once "./bd/base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM zapatos;");
$zapato = $sentencia->fetch(PDO::FETCH_OBJ);
$sentencia = $base_de_datos->query("SELECT * FROM sexo;");
$sexo = $sentencia->fetchAll(PDO::FETCH_OBJ);
$sentencia = $base_de_datos->query("SELECT * FROM marca;");
$marca = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!-- Formulario de registro de videojuego desde panel -->
<div class="container-fluid bg-3">
	<h1>Nuevo Zapato</h1>
	<form method="post" action="nuevo_zapato.php">
		<label for="Nombre">Nombre:</label>
		<input class="form-control" name="Nombre" required type="text" id="Nombre" placeholder="Introduzca el Nombre">

    <label for="IdSexo">Sexo:</label>
      <br>
      <select name="IdSexo">
        <option>Seleccione:</option>
        <?php
           foreach($sexo as $sex){ 
            echo '<option id="IdSexo" value="'.$sex->idSexo.'">'.$sex->Sexo.'</option>';
          }
        ?>
      </select>
      <br>

      <label for="IdMarca">Marca:</label>
      <br>
      <select name="IdMarca">
        <option>Seleccione:</option>
        <?php
           foreach($marca as $marc){ 
            echo '<option id="IdMarca" value="'.$marc->idMarca.'">'.$marc->Nombre.'</option>';
          }
        ?>
      </select>
      <br>

    <label for="Precio">Precio:</label>
    <input class="form-control" name="Precio" required type="number" id="Precio" placeholder="Precio">

		<label for="Lanzamiento">Lanzamiento:</label>
		<input class="form-control" name="Lanzamiento" required type="date" id="Lanzamiento" placeholder="Lanzamiento">

		<label for="Descripcion">Descripcion:</label>
		<input class="form-control" name="Descripcion" required type="text" id="Descripcion" placeholder="Descripcion">
       
    <label for="Imagen">Imagen:</label>
		<input class="form-control" name="Imagen" required type="file" id="Imagen" placeholder="Imagen">

    <label for="Imagen2">Imagen2:</label>
    <input class="form-control" name="Imagen2" required type="file" id="Imagen2" placeholder="Imagen2">

    <label for="Imagen3">Imagen3:</label>
    <input class="form-control" name="Imagen3" required type="file" id="Imagen3" placeholder="Imagen3">

        <br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div><br>

<?php include_once "footer.php"?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
