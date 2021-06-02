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
  <li class="active">Editar producto</li>        
</ol>
<!-- Si no existe el id salga de la pagina 
y conectamos a la base de datos y realizamos la consulta-->
<?php
if(!isset($_GET["idProductos"])) exit();
$idProductos = $_GET["idProductos"];
include_once "./bd/base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM productos WHERE idProductos = ?;");
$sentencia->execute([$idProductos]);
$productos = $sentencia->fetch(PDO::FETCH_OBJ);
$sentencia = $base_de_datos->query("SELECT * FROM zapatos;");
$zapato = $sentencia->fetchAll(PDO::FETCH_OBJ);
$sentencia = $base_de_datos->query("SELECT * FROM tallas;");
$tallas = $sentencia->fetchAll(PDO::FETCH_OBJ);
if($zapato === FALSE){
	echo "¡No existe algún producto con ese ID!";
	exit();
}

?>
<!-- Hacer un formulario que envie la informacion a un php encargado de actualizar datos -->
	<div class="container-fluid">
		<h1>Editar producto con el ID <?php echo $productos->idProductos; ?></h1>
		<form method="post" action="guardarDatosEditadosproducto.php">
      <input type="hidden" name="idProductos" value="<?php echo $productos->idProductos; ?>">
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
			<a class="btn btn-warning" href="./listar.php">Cancelar</a>
		</form>
	</div>

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
