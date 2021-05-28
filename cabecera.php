<?php 
session_start();
//error_reporting(0);
//Guardamos las sesiones en variables
$idUser = $_SESSION['idUsuario'];
$nombre = $_SESSION['Nombre'];
$apellido1 = $_SESSION['Apellido1'];
$apellido2 = $_SESSION['Apellido2'];
$Rol = $_SESSION['Rol'];
//realizamos varios condicionales en funcion del rol modificando la barra de navegacion.
if($Rol=="Admin"){
echo ' 
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
    <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
    </button>
    <img src="images/logo.png" class="img-responsive logoCab" alt="Image">
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
            <li><a href="home.php">Inicio</a></li>
            <li><a href="catalogo.php">Catálogo</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="vender.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
            <li><a href="listar.php"><span class="glyphicon glyphicon-cog"></span> Administracion</a></li>
            <li><a href="desloguear_usuario.php"><span class="glyphicon glyphicon-log-out"></span> Cerrar Sesion</a></li>
        </ul>
    </div>
</div>
</nav>
';
}else if($Rol=="Usuario"){
    echo ' 
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle logoCab" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
        </button>
        <img src="images/logo.png" class="img-responsive logoCab" alt="Image">
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
            <li><a href="home.php">Inicio</a></li>
            <li><a href="catalogo.php">Catálogo</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="vender.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
            <li><a href="ajuste_user.php"><span class="glyphicon glyphicon-user"></span> '. $nombre . ' ' . $apellido1 . ' ' . $apellido2 . ' : ' . $Rol .'</a></li>
            <li><a href="desloguear_usuario.php"><span class="glyphicon glyphicon-log-out"></span> Cerrar Sesion</a></li>
        </ul>
        </div>
    </div>
    </nav>
    ';
}else{
    echo ' 
    <nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle logoCab" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
        </button>
        <img src="images/logo.png" class="img-responsive logoCab" alt="Image">
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
            <li><a href="home.php">Inicio</a></li>
            <li><a href="catalogo.php">Catálogo</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="Login/Login.html"><span class="glyphicon glyphicon-user"></span> Iniciar Sesion</a></li>
            <li><a href="Login/Registro.html"><span class="glyphicon glyphicon-log-in"></span> Registrarse</a></li>
        </ul>
        </div>
    </div>
    </nav>
    ';
}
                ?>