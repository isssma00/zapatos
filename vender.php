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
  <li class="active">Carrito</li>        
</ol>
<?php 
include_once "./bd/base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM marca;");
$marca = $sentencia->fetchAll(PDO::FETCH_OBJ);
$sentencia = $base_de_datos->query("SELECT * FROM zapatos;");
$zapatos = $sentencia->fetchAll(PDO::FETCH_OBJ);
$sentencia = $base_de_datos->query("SELECT * FROM sexo;");
$sexo = $sentencia->fetchAll(PDO::FETCH_OBJ);
$sentencia = $base_de_datos->query("SELECT * FROM tallas;");
$tallas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!-- Iniciamos la sesion carrito donde guardaremos los productos -->
<?php 
if(!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
$granTotal = 0;
?>
	<div class="container-fluid bg-3 text-center">
		<h1>Carrito de la compra</h1>
		<!-- Generamos un status para ver errores en tiempo de compilacion como 
		que se realiza la venta correctamente, o el producto no existe -->
		<?php
			if(isset($_GET["status"])){
				if($_GET["status"] === "1"){
					?>
						<div class="alert alert-success">
							<strong>¡Correcto!</strong> Venta realizada correctamente
						</div>
					<?php
				}else if($_GET["status"] === "2"){
					?>
					<div class="alert alert-info">
							<strong>Venta cancelada</strong>
						</div>
					<?php
				}else if($_GET["status"] === "3"){
					?>
					<div class="alert alert-info">
							<strong>Ok</strong> Producto quitado de la lista
						</div>
					<?php
				}else if($_GET["status"] === "4"){
					?>
					<div class="alert alert-warning">
							<strong>Error:</strong> El producto que buscas no existe
						</div>
					<?php
				}else if($_GET["status"] === "5"){
					?>
					<div class="alert alert-danger">
							<strong>Error: </strong>El producto está agotado
						</div>
					<?php
				}else{
					?>
					<div class="alert alert-danger">
							<strong>Error:</strong> Algo salió mal mientras se realizaba la venta
						</div>
					<?php
				}
			}
		?>
		<br><br>
		<form action="./terminarVenta.php" method="POST">
		<!-- Generamos una tabla que muestre productos -->
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Modelo </th>
					<th>Marca </th>
					<th>Sexo </th>
					<th>Talla </th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>Total</th>
					<th>Quitar</th>
				</tr>
			</thead>
			<tbody>
				<!-- Bucle que recorrer la sesion carrito y la asocia a un variable que 
				guarda la informacion de un producto y añadimos una sumatoria final para el recuento -->
				<?php foreach($_SESSION["carrito"] as $indice => $producto){ 
						$granTotal += $producto->cantidad;
					?>
					<?php foreach($zapatos as $zap){ ?>
					    <?php foreach($marca as $mark){ ?>
					      <?php foreach($sexo as $sex){ ?>
					      	<?php foreach($tallas as $tal){ ?>
					
				<tr>
					<!--Imprimimos los valores del bucle anterior-->
					<?php
					if(($producto->IdZapatos) == ($zap->idZapatos)){
					if(($producto->IdTallas) == ($tal->idTalla)){
				     if(($zap->IdMarca) == ($mark->idMarca)){
				      if(($zap->IdSexo) == ($sex->idSexo)){
			      	?>
                   <td name="Modelo"><?php echo $zap->Nombre ?></td>
					<td name="Marca"><?php echo $mark->Nombre  ?></td>
					<td name="Sexo"><?php echo $sex->Sexo  ?></td>
					<td name="Talla"><?php echo $tal->Numero  ?></td>
					<td name="Precio"><?php echo $zap->Precio; echo'€'?></td>
					<td name="Cantidad"><?php echo $producto->cantidad ?></td>
					<td name="totalt"><?php $total = $zap->Precio * $producto->cantidad; echo $total; echo'€' ?></td>
					<?php $totalt += $total; ?>
					<td><a class="btn btn-danger glyphicon glyphicon-trash" href="<?php echo "quitarDelCarrito.php?indice=" . $indice?>"><i class="fa fa-trash"></i></a></td>
					</form>
					<?php
					}}}
					  }else {
					  }
					    ?>
				</tr>
				<?php } ?>
				<?php } ?>
				<?php } ?>
				<?php } ?>
				<?php } ?>
			</tbody>
		</table>

		<h3>Total: <?php echo'' . $granTotal . ' zapatos'; ?></h3>
		<h3>Total: <?php echo '' . $totalt . '€' ?></h3>
		
			<input name="total" type="hidden" value="<?php echo $granTotal;?>">
			<button type="submit" name="submitPayment" class="btn btn-success">Terminar venta</button>
			<a href="./catalogo.php" class="btn btn-danger">Cancelar venta</a>
		</form>
	</div><br>
	<?php include_once "footer.php"?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>