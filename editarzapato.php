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
  <li class="active">Editar zapato</li>        
</ol>
<!-- Si no existe el id salga de la pagina 
y conectamos a la base de datos y realizamos la consulta-->
<?php
if(!isset($_GET["idZapatos"])) exit();
$idZapatos = $_GET["idZapatos"];
include_once "./bd/base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM zapatos WHERE idZapatos = ?;");
$sentencia->execute([$idZapatos]);
$zapatos = $sentencia->fetch(PDO::FETCH_OBJ);
$sentencia = $base_de_datos->query("SELECT * FROM marca;");
$marca = $sentencia->fetchAll(PDO::FETCH_OBJ);
$sentencia = $base_de_datos->query("SELECT * FROM sexo;");
$sexo = $sentencia->fetchAll(PDO::FETCH_OBJ);
if($zapatos === FALSE){
	echo "¡No existe algún producto con ese ID!";
	exit();
}

?>
<!-- Hacer un formulario que envie la informacion a un php encargado de actualizar datos -->
	<div class="container-fluid">
		<h1>Editar producto con el ID <?php echo $zapatos->idZapatos; ?></h1>
		<form method="post" action="guardarDatosEditadoszapato.php">
			<input type="hidden" name="idZapatos" value="<?php echo $zapatos->idZapatos; ?>">
			<label for="Nombre">Nombre:</label>
			<input value="<?php echo $zapatos->Nombre ?>" class="form-control" name="Nombre" required type="text" id="Nombre" placeholder="zapatos">

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
      <input value="<?php echo $zapatos->Precio ?>" class="form-control" name="Precio" required type="number" id="Precio" placeholder="Precio">

      <label for="Lanzamiento">Lanzamiento:</label>
			<input value="<?php echo $zapatos->Lanzamiento ?>" class="form-control" name="Lanzamiento" required type="date" id="Lanzamiento" placeholder="">

      <label for="Descripcion">Descripcion:</label>
			<input value="<?php echo $zapatos->Descripcion ?>" class="form-control" name="Descripcion" required type="text" id="Descripcion" placeholder="zapatos">

      <label for="Imagen">Imagen:</label>
			<input value="<?php echo $zapatos->Imagen ?>" class="form-control" name="Imagen" required type="file" id="Imagen">

      <label for="Imagen2">Imagen2:</label>
      <input value="<?php echo $zapatos->Imagen2 ?>" class="form-control" name="Imagen2" required type="file" id="Imagen2">

      <label for="Imagen3">Imagen3:</label>
      <input value="<?php echo $zapatos->Imagen3 ?>" class="form-control" name="Imagen3" required type="file" id="Imagen3">

			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="./listar.php">Cancelar</a>
		</form>
	</div>

  <?php include_once "footer.php"?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
