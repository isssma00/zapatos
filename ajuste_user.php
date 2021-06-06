<!DOCTYPE html>
<html lang="en">
<head>
  <title>MUNDO ZAPAS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Enlaces de estilos -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="./css/estilos.css" rel="stylesheet" type="text/css">
</head>
<body>
<!-- Banner -->
<div class="jumbotron">
  <div class="container text-center">
    <br><br/>
    <br><br/>
    <br><br/>
    <br><br/>
    <br><br/>
  </div>
</div>
<!-- Insertar cabecera -->
<?php include_once "cabecera.php"?>
<ol class="breadcrumb">
  <li><a href="home.php">Home</a></li>
  <li><a href="catalogo.php">Catalogo</a></li>
  <li class="active">Modificar datos personales</li>        
</ol>
<!-- Llamar al conector de la base de datos -->
<?php 
  require "./bd/base_de_datos.php";
?>
<!-- Ejecutamos la funcion necesaria y guardamos la sesion idUsuario -->
<?php
    $idUsuario = $_SESSION["idUsuario"];
    $sentencia = $base_de_datos->query("SELECT * FROM usuario WHERE(`idUsuario` = '$idUsuario');");
    $usuario = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
    <div class="container-fluid">
		<h1>Informacion Personal</h1>
		<br>
    <!-- Creamos la primera fila de la tabla -->
		<table class="table table-bordered">
			<thead>
      <tr>
        <th>Id</th>
        <th>Usuario</th>
        <th>Password</th>
        <th>Nombre</th>
        <th>Apellido1</th>
        <th>Apellido2</th>
        <th>Teléfono</th>
        <th>Correo</th>
        <th>Dirección</th>
        <th>Código Postal</th>
        <th>Comunidad Autónoma</th>
        <th>Provincia</th>
        <th>Dni</th>
        <th>Modificar Perfil</th>
        <th>Darse de baja</th>
      </tr>
			</thead>
			<tbody>
      <!-- Realizamos un buble que imprime varias lineas de datos respecto a la cunsulta anterior -->
				<?php foreach($usuario as $user){ ?>
				<tr>
          <td><?php echo $user->idUsuario ?></td>
          <td><?php echo $user->Usuario ?></td>
          <td><?php echo $user->Password?></td>
          <td><?php echo $user->Nombre?></td>
          <td><?php echo $user->Apellido1?></td>
          <td><?php echo $user->Apellido2?></td>
          <td><?php echo $user->Telefono?></td>
          <td><?php echo $user->Email?></td>
          <td><?php echo $user->Direccion?></td>
          <td><?php echo $user->CP?></td>
          <td><?php echo $user->ComunidadAutonoma?></td>
          <td><?php echo $user->Provincia?></td>
          <td><?php echo $user->Dni?></td>
					<td><a class="btn btn-warning glyphicon glyphicon-pencil" href="<?php echo "editaru.php?idUsuario=" . $user->idUsuario?>"><i class="fa fa-edit"></i></a></td>
          <form method="post" action="eliminaru.php">
					<input type="hidden" name="idUsuario" value="<?php echo $user->idUsuario; ?>">
					<td><a><button onclick="return alerta()" class="btn btn-danger glyphicon glyphicon-trash" href="<?php echo "eliminaru.php?idUsuario=" . $user->idUsuario?>"><i class="fa fa-trash"></i></button></a></td>
					</form>
        </tr>
<?php } ?>
			</tbody>
		</table>
	</div>
  <!-- pie de página -->
  <?php include_once "footer.php"?>
<script src="./js/listar.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>