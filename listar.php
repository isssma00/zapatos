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
//$Rol es una sesion
if($Rol=="Usuario"){
header("Location: ./Home.php");
}else if($Rol==""){
header("Location: ./Home.php");
}else
	?>
<!-- tabla desplegable para varios paneles -->
<div class="tab">
  <button class="enlace" onclick="abrirTabla(event, 'Product')">Productos</button>
  <button class="enlace" onclick="abrirTabla(event, 'Marc')">Marcas</button>
  <button class="enlace" onclick="abrirTabla(event, 'Usu')">Usuarios</button>
  <button class="enlace" onclick="abrirTabla(event, 'Zapa')">Zapatillas</button>
  <button class="enlace" onclick="abrirTabla(event, 'Come')">Comentarios</button>
</div>
<!-- Conectar a la base de datos y ejecutar funciones -->
<?php
include_once "./bd/base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM productos;");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
$sentencia = $base_de_datos->query("SELECT * FROM usuario;");
$usuario = $sentencia->fetchAll(PDO::FETCH_OBJ);
$sentencia = $base_de_datos->query("SELECT * FROM marca;");
$marca = $sentencia->fetchAll(PDO::FETCH_OBJ);
$sentencia = $base_de_datos->query("SELECT * FROM zapatos;");
$zapatos = $sentencia->fetchAll(PDO::FETCH_OBJ);
$sentencia = $base_de_datos->query("SELECT * FROM sexo;");
$sexo = $sentencia->fetchAll(PDO::FETCH_OBJ);
$sentencia = $base_de_datos->query("SELECT * FROM tallas;");
$tallas = $sentencia->fetchAll(PDO::FETCH_OBJ);
$sentencia = $base_de_datos->query("SELECT * FROM sistema;");
$sistema = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<!-- Tabla de productos -->
	<div class="container-fluid bg-3 tabcontent" id="Product">
		<h1>Productos</h1>
		<div>
			<a class="btn btn-success" href="./insertar_producto.php">Nuevo <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<div class="barra">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>IdProductos</th>
					<th>Modelo</th>
					<th>Marca</th>
					<th>Sexo</th>
					<th>Talla</th>
					<th>Stock</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($productos as $producto){ ?>
				<?php foreach($marca as $marc){ ?>
				<?php foreach($zapatos as $zapa){ ?>
				<?php foreach($sexo as $sex){ ?>
				<?php foreach($tallas as $tall){ ?>
				<?php
				if(($producto->IdZapatos) == ($zapa->idZapatos)){
				if(($producto->IdTallas) == ($tall->idTalla)){  
				if(($zapa->IdSexo) == ($sex->idSexo)){
				if(($zapa->IdMarca) == ($marc->idMarca)){  
					?>
				<tr>
					<td><?php echo $producto->idProductos ?></td>
					<td><?php echo $zapa->Nombre  ?></td>
					<td><?php echo $marc->Nombre  ?></td>
					<td><?php echo $sex->Sexo  ?></td>
					<td><?php echo $tall->Numero  ?></td>
					<td><?php echo $producto->Stock ?></td>
					<td><a class="btn btn-warning glyphicon glyphicon-pencil" href="<?php echo "editarproducto.php?idProductos=" . $producto->idProductos?>"><i class="fa fa-edit"></i></a></td>
					<form method="post" action="eliminarproducto.php">
					<input type="hidden" name="idProductos" value="<?php echo $producto->idProductos; ?>">
					<td><a><button onclick="return alerta()" class="btn btn-danger glyphicon glyphicon-trash" href="<?php echo "eliminarproducto.php?idProductos=" . $producto->idProductos?>"><i class="fa fa-trash"></i></button></a></td>
					</form>				
				</tr>
				<?php }}}} ?>
				<?php } ?>
				<?php } ?>
				<?php } ?>
				<?php } ?>
				<?php } ?>
			</tbody>
		</table>
		</div>
	</div>
<!-- Tabla de Marcas -->
  <div class="container-fluid bg-3 tabcontent" id="Marc">
		<h1>Marca</h1>
		<div>
			<a class="btn btn-success" href="./insertar_marca.php">Nuevo <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<div class="barra">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>IdMarca</th>
					<th>Nombre </th>
					<th>Fundacion </th>
					<th>Descripcion</th>
					<th>Logo</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($marca as $mark){ ?>
				<tr>
					<td><?php echo $mark->idMarca ?></td>
					<td><?php echo $mark->Nombre  ?></td>
					<td><?php echo $mark->Fundacion  ?></td>
					<td><textarea class="tamDescripcion"><?php echo $mark->Descripcion ?></textarea></td>
					<td><?php echo $mark->Logo ?></td>
					<td><a class="btn btn-warning glyphicon glyphicon-pencil" href="<?php echo "editarmarca.php?idMarca=" . $mark->idMarca?>"><i class="fa fa-edit"></i></a></td>
					<form method="post" action="eliminarmarca.php">
					<input type="hidden" name="idMarca" value="<?php echo $mark->idMarca; ?>">
					<td><a><button onclick="return alerta()" class="btn btn-danger glyphicon glyphicon-trash" href="<?php echo "eliminarmarca.php?idMarca=" . $mark->idMarca?>"><i class="fa fa-trash"></i></button></a></td>
					</form>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		</div>
	</div>
<!-- Tabla de usuarios -->
  <div class="container-fluid bg-3 tabcontent" id="Usu">
		<h1>Usuarios</h1>
		<div>
			<a class="btn btn-success" href="./insertar_user.php">Nuevo <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<div class="barra">
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
					<th>Rol</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
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
					<td><?php echo $user->Rol?></td>
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
	</div>
	<!-- Tabla de zapatos -->
  <div class="container-fluid bg-3 tabcontent" id="Zapa">
		<h1>Zapatos</h1>
		<div>
			<a class="btn btn-success" href="./insertar_zapato.php">Nuevo <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<div class="barra">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>IdZapato</th>
					<th>Nombre </th>
					<th>Marca </th>
					<th>Precio </th>
					<th>sexo </th>
          			<th>Lanzamiento </th>
          			<th>Descripcion </th>
          			<th>Imagen </th>
          			<th>Imagen2 </th>
          			<th>Imagen3 </th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($zapatos as $zapa){ ?>
				<?php foreach($marca as $mark){ ?>
				<?php foreach($sexo as $sex){ ?>
				<?php
				if(($zapa->IdSexo) == ($sex->idSexo)){
				if(($zapa->IdMarca) == ($mark->idMarca)){  
					?>
				<tr>
					<td><?php echo $zapa->idZapatos ?></td>
					<td><?php echo $zapa->Nombre  ?></td>
					<td><?php echo $mark->Nombre  ?></td>
					<td><?php echo $zapa->Precio  ?></td>
					<td><?php echo $sex->Sexo  ?></td>
          			<td><?php echo $zapa->Lanzamiento  ?></td>
          			<td><textarea class="tamDescripcion"><?php echo $zapa->Descripcion  ?></textarea></td>
          			<td><?php echo $zapa->Imagen  ?></td>
          			<td><?php echo $zapa->Imagen2  ?></td>
          			<td><?php echo $zapa->Imagen3  ?></td>
					<td><a class="btn btn-warning glyphicon glyphicon-pencil" href="<?php echo "editarzapato.php?idZapatos=" . $zapa->idZapatos?>"><i class="fa fa-edit"></i></a></td>
					<form method="post" action="eliminarzapato.php">
					<input type="hidden" name="idZapatos" value="<?php echo $zapa->idZapatos; ?>">
					<td><a><button onclick="return alerta()" class="btn btn-danger glyphicon glyphicon-trash" href="<?php echo "eliminarzapato.php?idZapatos=" . $zapa->idZapatos?>"><i class="fa fa-trash"></i></button></a></td>
					</form>
				</tr>
				<?php }} ?>
				<?php } ?>
				<?php } ?>
				<?php } ?>

			</tbody>
		</table>
		</div>
	</div>
	<!-- Tabla de sistema -->
	<div class="container-fluid bg-3 tabcontent" id="Come">
		<h1>Sistema de comentario y voto</h1>
		<br>
		<div class="barra">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>IdSistema</th>
					<th>Comentario</th>
					<th>Puntuación</th>
					<th>Usuario</th>
					<th>Zapato</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($sistema as $sis){ ?>
					<?php foreach($usuario as $usu){ ?>
					<?php foreach($zapatos as $zapa){ ?>
					<?php
						if(($sis->IdUsuario) == ($usu->idUsuario)){
						if(($sis->IdZapato) == ($zapa->idZapatos)){  
						?>
				<tr>
					<td><?php echo $sis->idSistema ?></td>
					<td><?php echo $sis->Comentario ?></td>
					<td><?php echo $sis->Puntuacion?></td>
					<td><?php echo $usu->Usuario?></td>
					<td><?php echo $zapa->Nombre?></td>
					<form method="post" action="eliminarsis.php">
					<input type="hidden" name="idSistema" value="<?php echo $sis->idSistema; ?>">
					<td><a><button onclick="return alerta()" class="btn btn-danger glyphicon glyphicon-trash" href="<?php echo "eliminarsis.php?idSistema=" . $sis->idSistema?>"><i class="fa fa-trash"></i></button></a></td>
					</form>
				</tr>
<?php }}}}} ?>
			</tbody>
		</table>
		</div>
	</div>
	<?php include_once "footer.php"?>

<script src="./js/listar.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
