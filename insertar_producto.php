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
  <li><a href="listar.php">Administración</a></li>
  <li class="active">Nuevo producto</li>        
</ol>
<?php
include_once "./bd/base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM productos;");
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
$sentencia = $base_de_datos->query("SELECT * FROM zapatos;");
$zapato = $sentencia->fetchAll(PDO::FETCH_OBJ);
$sentencia = $base_de_datos->query("SELECT * FROM tallas;");
$talla = $sentencia->fetchAll(PDO::FETCH_OBJ);
$sentencia = $base_de_datos->query("SELECT * FROM sexo;");
$sexo = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!-- Formulario de registro de videojuego desde panel -->
<div class="container-fluid bg-3">
	<h1>Nuevo Producto</h1>
	<form method="post" action="nuevo_producto.php">
		<label for="IdZapatos">Zapato:</label>
      <br>
      <select name="IdZapatos" id="IdZapatos" onchange="activarBoton()">
        <option>Seleccione:</option>
        <?php
           foreach($zapato as $zap){ 
            echo '<option id="IdZapatos" value="'.$zap->idZapatos.'">'.$zap->Nombre.'</option>';
          }
          
        ?>
      </select>
      <br>
      <section id="contenedor"></section>
      <br>

		<label for="Stock">Stock:</label>
		<input class="form-control" name="Stock" required type="number" id="Stock" placeholder="Stock">

        <br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div><br>

<?php include_once "footer.php"?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
$("#IdZapatos").on('change', function() {
    if ($(this).val()!="") {
        var codigo = $(this).val();                   
        var nombre = $("#IdZapatos option:selected").text();        
        console.log('El código es: ' + codigo + '\nEl nombre es: ' + nombre );
        $("#contenedor").load("tallaje.php",{codigo});

    }
});
</script>
</body>
</html>
