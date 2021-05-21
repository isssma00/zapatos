<?php
include_once "./bd/base_de_datos.php";

$sentencia = $base_de_datos->query("SELECT * FROM tallas;");
$talla = $sentencia->fetchAll(PDO::FETCH_OBJ);
$x = $_REQUEST['codigo'];

$sentencia = $base_de_datos->prepare("SELECT * FROM zapatos WHERE idZapatos = ?;");
$sentencia->execute([$x]);
$zapatos = $sentencia->fetch(PDO::FETCH_OBJ);
?>

<label for="IdTallas">Talla:</label>
      <br>
      <select name="IdTallas" id="talla">
        <option selected>Seleccione:</option>
        <?php
           foreach($talla as $tal){ 
                if (($zapatos->IdSexo) == $tal->IdSexo) {
            echo '<option id="IdTallas" value="'.$tal->idTalla.'">'.$tal->Numero.'</option>';

          }}
        ?>
    </select>