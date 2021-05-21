<!DOCTYPE html>
<html lang="es-ES">
	<head>
	    <meta charset="utf-8">
		<title>Nueva contraseña</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	</head>
	<body class="row m-0 justify-content-center align-items-center vh-100">
        <div style="width: 50rem;">
            <div class="card-body">
                <center>
                    <?php
                        require "../bd/Conector_BD.php";
						require "../bd/DAOUsuario.php";
                        //Recogemos los valores del formulario.
                        $Dni = $_POST["DNI"];
                        $password = $_POST["password"];
                        //Creamos la conexión a la BD.
                        $conexion = conectar(true);
                        //Lanzamos la consulta.
                        $consulta = consultaNueva($conexion, $Dni, $password);
                        if(mysqli_num_rows($consulta) == 1)
                        {
                            $sql = "UPDATE `Tienda_Online`.`Usuario` SET `Password` = '$password' WHERE(`Dni` = '$Dni')";
                            if(mysqli_query($conexion, $sql))
                            {
                                echo "<h3>Dni correcto.</h3><br>";
                                echo "<h3>Nueva contraseña establecida.</h3>";
                            }
                            else
                            {
                                echo "Error: " . $sql . " " . mysqli_error($conexion);
                            }
                            $conexion->close();
                        }
                        else
                        {
                            $consulta = consultaDni($conexion, $Dni);
                            if(mysqli_num_rows($consulta) == 1)
                            {
                                $sql = "UPDATE `Tienda_Online`.`Usuario` SET `Password` = '$password' WHERE(`Dni` = '$Dni')";
                                if(mysqli_query($conexion, $sql))
                                {
                                    echo "<h3>Dni correcto.</h3><br>";
                                    echo "<h3>Nueva contraseña establecida.</h3>";
                                }
                                else
                                {
                                    echo "Error: " . $sql . " " . mysqli_error($conexion);
                                }
                                $conexion->close();
                            }
                            else
                            {
                                echo "<h3>Dni incorrecto.</h3><br>";
                                echo "<h3>No se ha podido establecer la nueva contraseña.</h3>";
                            }
                        }
                    ?>
                    <br>
                    <a href="./Login.html">Iniciar sesión.</a>
                    <br>
                    <a href="./Registro.html">Crear nueva cuenta.</a>
                    <br>
                    <a href="./OlvidaContrasena.html">Establecer contraseña de nuevo.</a>
                </center>
            </div>
        </div>
	</body>
</html>