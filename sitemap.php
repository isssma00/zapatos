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
  <li class="active">Mapa del sitio</li>        
</ol>
<div class="container-fluid bg-3 text-center row"> 
<?php 
//realizamos varios condicionales en funcion del rol modificando la barra de navegacion.
if($Rol=="Admin"){
echo '
<div class="cardc" style="max-width: 100rem; width: auto; margin: auto auto">
  <div class="row alinearCentroV">
  <div class="col-xs-4">
  <h1>Insertar nuevo </h1>
    <br>
    <p><a href="http://localhost/zapatos/insertar_producto.php">Insertar nuevo productos</a></p>
    <p><a href="http://localhost/zapatos/insertar_user.php">Insertar nuevo usuario</a></p>
    <p><a href="http://localhost/zapatos/insertar_zapato.php">Insertar nuevo zapato</a></p>
    <p><a href="http://localhost/zapatos/insertar_marca.php">Insertar nueva marca</a></p>
    </div>
    <div class="col-xs-4">
    <h2><a href="http://localhost/zapatos/home.php">Home</a></h2>
    <h2><a href="http://localhost/zapatos/vender.php">Carrito</a></h2>
    <h2><a href="http://localhost/zapatos/listar.php">Panel de Administracion</a></h2>
    <h2><a href="http://localhost/zapatos/desloguear_usuario.php">Desloguearse</a></h2>
    <br>
    </div>
    <div class="col-xs-4">
    <h1>Catalogo Filtrado por sexo</h1>
    <br>
    <p><a href="http://localhost/zapatos/catalogo.php?idSexo=1">Zapatos de hombre</a></p>
    <p><a href="http://localhost/zapatos/catalogo.php?idSexo=2"> Zapatos de mujer</a></p>
    <p><a href="http://localhost/zapatos/catalogo.php?idSexo=3"> Zapatos de niño</a></p>
    <p><a href="http://localhost/zapatos/catalogo.php?idSexo=4">Zapatos de niña</a></p>
    </div>
</div>
</div>
';}else if($Rol=="Usuario"){
    echo ' 
    <div class="cardc" style="max-width: 100rem; width: auto; margin: auto auto">
  <div class="row alinearCentroV">
    <div class="col-xs-6">
    <h2><a href="http://localhost/zapatos/home.php">Home</a></h2>
    <h2><a href="http://localhost/zapatos/vender.php">Carrito</a></h2>
    <h2><a href="http://localhost/zapatos/desloguear_usuario.php">Desloguearse</a></h2>
    <h2><a href="http://localhost/zapatos/ajuste_user.php">Modificar DatosPersoales</a></h2>
    <br>
    </div>
    <div class="col-xs-6">
    <h1>Catalogo Filtrado por sexo</h1>
    <br>
    <p><a href="http://localhost/zapatos/catalogo.php?idSexo=1">Zapatos de hombre</a></p>
    <p><a href="http://localhost/zapatos/catalogo.php?idSexo=2"> Zapatos de mujer</a></p>
    <p><a href="http://localhost/zapatos/catalogo.php?idSexo=3"> Zapatos de niño</a></p>
    <p><a href="http://localhost/zapatos/catalogo.php?idSexo=4">Zapatos de niña</a></p>
    </div>
</div>
</div>
';}else{
    echo ' 
    <div class="cardc" style="max-width: 100rem; width: auto; margin: auto auto">
  <div class="row alinearCentroV">
    <div class="col-xs-6">
    <h2><a href="http://localhost/zapatos/home.php">Home</a></h2>
    <h2><a href="http://localhost/zapatos/catalogo.php">Catalogo</a></h2>
    <h2><a href="http://localhost/zapatos/Login/Login.html">Iniciar Sesion</a></h2>
    <h2><a href="http://localhost/zapatos/Login/Registro.html">Registrarse</a></h2>
    <h2><a href="http://localhost/zapatos/Login/OlvidaContrasena.html">Olvidó Contraseña</a></h2>
    <br>
    </div>
    <div class="col-xs-6">
    <h1>Catalogo Filtrado por sexo</h1>
    <br>
    <p><a href="http://localhost/zapatos/catalogo.php?idSexo=1">Zapatos de hombre</a></p>
    <p><a href="http://localhost/zapatos/catalogo.php?idSexo=2"> Zapatos de mujer</a></p>
    <p><a href="http://localhost/zapatos/catalogo.php?idSexo=3"> Zapatos de niño</a></p>
    <p><a href="http://localhost/zapatos/catalogo.php?idSexo=4">Zapatos de niña</a></p>
    </div>
</div>
</div>
    ';}
?>
</div>
<br>
<br>
<br>
<?php include_once "footer.php"?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
