<!DOCTYPE html>
<html lang="en">
<head>
  <title>MUNDO ZAPAS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="./css/estilos.css" rel="stylesheet" type="text/css">
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
<!-- Conectar con la base de datos -->
<?php
if(!isset($_GET["idZapatos"])) exit();
$idZapatos = $_GET["idZapatos"];
include_once "./bd/base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM zapatos WHERE idZapatos = ?;");
$sentencia->execute([$idZapatos]);
$zapatos = $sentencia->fetch(PDO::FETCH_OBJ);
$sentencia = $base_de_datos->query("SELECT * FROM marca;");
$marca = $sentencia->fetchAll(PDO::FETCH_OBJ);
$sentencia = $base_de_datos->query("SELECT * FROM productos;");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
$sentencia = $base_de_datos->query("SELECT * FROM tallas;");
$tallas = $sentencia->fetchAll(PDO::FETCH_OBJ);
$sentencia = $base_de_datos->query("SELECT * FROM sexo;");
$sexo = $sentencia->fetchAll(PDO::FETCH_OBJ);
$sentencia = $base_de_datos->query("SELECT * FROM sistema;");
$sistema = $sentencia->fetchAll(PDO::FETCH_OBJ);
$sentencia = $base_de_datos->query("SELECT * FROM usuario;");
$usuario = $sentencia->fetchAll(PDO::FETCH_OBJ);
if($zapatos === FALSE){
	echo "¡No existe ningun producto con ese ID!";
	exit();
}

?>
<!-- Tarjeta con el conenido -->
<div class="cardc" style="max-width: 100rem; width: auto; margin: auto auto">
  <div class="row alinearCentroV">
    <div class="col-xs-4">
      <!-- Esto es un comentario 
      <img src="./images/fozapas/<?php echo $zapatos->Imagen ?>" class="card-img fotoTam" alt="imagen">
      Esto es un comentario -->

  <!-- Full-width images with number text -->
  <div class="mySlides">
    <div class="numbertext">1 / 3</div>
      <img src="./images/fozapas/<?php echo $zapatos->Imagen ?>" class="card-img fotoTam">
  </div>

  <div class="mySlides">
    <div class="numbertext">2 / 3</div>
      <img src="./images/fozapas/<?php echo $zapatos->Imagen2 ?>" class="card-img fotoTam">
  </div>

  <div class="mySlides">
    <div class="numbertext">3 / 3</div>
      <img src="./images/fozapas/<?php echo $zapatos->Imagen3 ?>" class="card-img fotoTam">
  </div>

  <!-- Thumbnail images -->
  <div>
    <div class="column">
      <img class="demo cursor" src="./images/fozapas/<?php echo $zapatos->Imagen ?>" style="width:100%" onclick="currentSlide(1)">
    </div>
    <div class="column">
      <img class="demo cursor" src="./images/fozapas/<?php echo $zapatos->Imagen2 ?>" style="width:100%" onclick="currentSlide(2)">
    </div>
    <div class="column">
      <img class="demo cursor" src="./images/fozapas/<?php echo $zapatos->Imagen3 ?>" style="width:100%" onclick="currentSlide(3)">
    </div>
  
</div>
    </div>
    <div class="col-xs-8">
      <div class="card-body">
        <h2><?php echo $zapatos->Nombre ?></h2>
        <p><?php echo $zapatos->Descripcion ?></p>
        <p><small class="text-muted">Fecha de lanzamiento: <?php echo $zapatos->Lanzamiento ?></small></p>
        <?php foreach($marca as $marc){ ?>
        <?php
        if(($zapatos->IdMarca) == ($marc->idMarca)){  
          ?>
         <?php echo'
        <div align="center"><img src="images/marcasYlogos/' . $marc->Logo . '" class="img-responsive logo" alt="Image"></div>
        <p class="price">' . $zapatos->Precio . '€</p>
        <form method="post" action="agregarAlCarrito.php">
        </form>
        ';?>
        <?php } ?>
        <?php } ?>
        <?php 
          ?>
          <form method="post" action="agregarAlCarrito.php">
          <label for="idProductos">Tallaje:</label>
          <select name="idProductos" class="filtroCatalogo negro opa">
            <option>Seleciona talla</option>
            <?php
           foreach($tallas as $tal){ 
            foreach($productos as $producto){
              if (($zapatos->idZapatos) == ($producto->IdZapatos)){
                if (($tal->idTalla) == ($producto->IdTallas)){
            echo '<option id="idProductos" value="'.$producto->idProductos.'">'.$tal->Numero.'</option>';
            }}}}?>
          </select> 
          <br>
          <br>
          <br>
         <?php 
         echo'
          <p> <button name="btn" type="submit" id="idProductos" value=""class="negro opa">Añadir al carrito</button></p>
         ';?>

         </form>
      </div>
    </div>
  </div>
</div>

</div><br><br><br>
<?php if($Rol != 0){ 
  echo'
<div class="cardc" style="max-width: 100rem; width: auto; margin: auto auto">
<div class=" comment">
<form id="sistema" name="sistema" action="nuevo_sistema.php" method="POST" class="needs-validation" novalidate>
<input type="hidden" name="idZapato" value="' . $idZapatos . '">
<input type="hidden" name="idUsuario" value="' . $idUser . '">
  <div class="form-group">
      <label>Comentario:</label>
      <input id="Comentario" required type="text" placeholder="Introduzca su comentario" class="form-control" name="Comentario" autofocus="autofocus">
  </div> 
  <div class="form-group">
      <label>Puntuacion:</label>
      <div class="inputDiv">
      <div class="etiqueta"></div>
      <input type="range" value="5" min="0" max="10" autocomplete="off" id="input1" name="Puntuacion">
      </div>
  </div> 
  <div class="form-group">
        <button class="btn btn-success" type="submit" name="submit">Enviar</button>
    </div>
</form>
</div>
</div><br><br><br>
 ';} ?>
<?php foreach($sistema as $sis){ ?>
  <?php foreach($usuario as $usu){ ?>
  <?php
  if(($sis->IdUsuario) == ($usu->idUsuario)){
    if(($sis->IdZapato) == ($idZapatos)){
    ?>
<div class="cardc" style="max-width: 100rem; width: auto; margin: auto auto">
<div class=" comment">
  <div class="form-group col-xs-4">
      <p><b>Usuario:</b> <?php echo $usu->Usuario  ?></p>
  </div> 
  <div class="form-group col-xs-4">
      <p><b>Comentario:</b> <?php echo $sis->Comentario  ?></p>
  </div> 
  <div class="form-group col-xs-3">
      <p><b>Puntuacion:</b> <?php echo'' . $sis->Puntuacion . '/10' ?></p>
  </div> 
  <?php
    if(($sis->IdUsuario) == ($idUser)){
    ?>
    <div class="form-group col-xs-1">
    <form method="post" action="eliminarsis.php">
      <input type="hidden" name="idSistema" value="<?php echo $sis->idSistema; ?>">
      <td><a><button onclick="return alerta()" class="btn btn-danger glyphicon glyphicon-trash" href="<?php echo "eliminarsis.php?idSistema=" . $sis->idSistema?>"><i class="fa fa-trash"></i></button></a></td>
		</form>
    </div>
  <?php } ?>
</div>
</div><br><br><br>
<?php }}}} ?>

<?php include_once "footer.php"?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
  var slideIndex = 1;
showSlides(slideIndex);

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
<script type="text/javascript">
        //para el input
  var Input = document.querySelector('#input1');
  Input.style.setProperty("--value", Input.value);

  if (Input) {
    var w = parseInt(window.getComputedStyle(Input, null).getPropertyValue('width'));

  Input.addEventListener("input", function(evt) {
    Input.style.setProperty("--value", Input.value);
},false);

  //para la etiqueta
  var etq = document.querySelector('.etiqueta');
  if (etq) {
    
    etq.innerHTML = Input.value+"%";

    var pxls = w / 10;

    etq.style.left = ((Input.value * pxls) - 15) + 'px';

    Input.addEventListener('input', function() {
      
      etq.innerHTML = Input.value+"%";
      etq.style.left = ((Input.value * pxls) - 15) + 'px';

    }, false);
  }
}
    </script>
</body>
</html>