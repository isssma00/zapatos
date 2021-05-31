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
require "./bd/Conector_BD.php";
require "./bd/DAOZapatos.php";
?>
    <div class="container text-center">
			<!-- Carrousel -->
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
					<li data-target="#myCarousel" data-slide-to="3"></li>
				</ol>
				<div class="carousel-inner">
					<?php
						//Creamos la conexión a la BD.
            $conexion = conectar(true);
						//Lanzamos la consulta.
						$consulta = consultaZapatos($conexion);
            $i = 0;
						while($fila = mysqli_fetch_assoc($consulta))
						{
					?>
					<div class="item <?php echo ($i == 0) ? 'active' : '';?>">
					<a href="infoZapato.php?idZapato=<?php echo $fila['idZapatos'];?>"><img src="./images/fozapas/<?php echo $fila['Imagen'];?>" alt="Zapatos" style="width:100%; height:800px;"></a>
					</div>
					<?php
							$i++;
						}
					?>
				</div>
				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
					<span class="sr-only">Anterior</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
					<span class="sr-only">Siguiente</span>
				</a>
			</div>
		</div>

<?php include_once "footer.php"?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
