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
<!-- conectamos y realizamos las consultas en la base de datos, 
y guardamos en la variable x el idMarca para usarlo como filtro-->
<?php
$x = $_GET["idMarca"];
$y = $_GET["idSexo"];
include_once "./bd/base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM productos;");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
$sentencia = $base_de_datos->query("SELECT * FROM marca;");
$marca = $sentencia->fetchAll(PDO::FETCH_OBJ);
$sentencia = $base_de_datos->query("SELECT * FROM zapatos;");
$zapatos = $sentencia->fetchAll(PDO::FETCH_OBJ);
$sentencia = $base_de_datos->query("SELECT * FROM sexo;");
$sexo = $sentencia->fetchAll(PDO::FETCH_OBJ);
$sentencia = $base_de_datos->query("SELECT * FROM tallas;");
$tallas = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>

<div class="container-fluid bg-3 text-center row"> 
<h1>MUNDO ZAPAS</h1><br>
<div class="col-xs-6">
      <select name="idMarca" onchange="location = this.value;" class="filtroCatalogo negro opa">
        <option>Filtrar por marca:</option>
        <?php
           foreach($marca as $marc){ 
            echo '<option id="idMarca" value="catalogo.php?idMarca='.$marc->idMarca.'">'.$marc->Nombre.'</option>';
          }
        ?>
      </select>
    </div>
      <div class="col-xs-6">
      <select name="idSexo" onchange="location = this.value;" class="filtroCatalogo negro opa">
        <option>Filtrar por sexo:</option>
        <?php
           foreach($sexo as $sex){ 
            echo '<option id="idSexo" value="catalogo.php?idSexo='.$sex->idSexo.'">'.$sex->Sexo.'</option>';
          }
        ?>
      </select>
      <br>
</div>

<div class="row"></div>
<br><br><br>
<!-- Si la variable x no esta definida que se muestre el catalogo, si no que se filtre ya que x tendrá valor -->
<?php
 if($x=="" && $y==""){
  ?>
  <!-- 3bucles foreach para recorrer las tres consultas y poner dos 
  condicionales para afinar el resultado y no se mezclen valores -->
<?php foreach($zapatos as $zap){ ?>
    <?php foreach($marca as $mark){ ?>
      <?php foreach($sexo as $sex){ ?>
    <?php
     if(($zap->IdMarca) == ($mark->idMarca)){
      if(($zap->IdSexo) == ($sex->idSexo)){
      echo ' 
      <div>
        <div class="cardc col-sm-6 col-md-4 col-lg-3 prueba">        
          <img src="images/fozapas/' . $zap->Imagen . '" class="img-responsive fotoTam" alt="Image">
          <p>'. $zap->Nombre . '</p>
          <p class="price">' . $zap->Precio . '€</p>
          <div align="center"><img src="images/marcasYlogos/' . $mark->Logo . '" class="img-responsive logo" alt="Image"></div>
          <br>
          <td><a href="infoZapato.php?idZapatos='  . $zap->idZapatos . '"><button class="negro opa">Más información</button></i></a></td>
        </div>
      </div>
      ';
    }
  }else {
  }
    ?>
    <?php } ?>
    <?php } ?>
	<?php } ?>
  <?php }else{ ?>
   <?php foreach($zapatos as $zap){ ?>
    <?php foreach($marca as $mark){ ?>
      <?php foreach($sexo as $sex){ ?>
    <?php
     if(($zap->IdMarca) == ($mark->idMarca)){
      if(($zap->IdSexo) == ($sex->idSexo)){ 
       $filtro= $x;
       $filtro2= $y;
      if (($mark->idMarca) == $filtro || ($sex->idSexo) == $filtro2){
        echo ' 
      <div>
        <div class="cardc col-sm-6 col-md-4 col-lg-3 prueba">        
          <img src="images/fozapas/' . $zap->Imagen . '" class="img-responsive fotoTam" alt="Image">
          <p>'. $zap->Nombre . '</p>
          <p class="price">' . $zap->Precio . '€</p>
          <div align="center"><img src="images/marcasYlogos/' . $mark->Logo . '" class="img-responsive logo" alt="Image"></div>
          <br>
          <td><a href="infoZapato.php?idZapatos='  . $zap->idZapatos . '"><button class="negro opa">Más información</button></i></a></td>
        </div>
      </div>
      ';
    }
      
  }else {
  }
    ?>
    <?php } ?>
    <?php } ?>
    <?php } ?>

	<?php } ?>
  <?php } ?>
</div>
<br>
<br>
<br>
<?php include_once "footer.php"?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
