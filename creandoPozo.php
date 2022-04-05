<?php

include_once("conexion.php");

$nombrePozo = $_POST['nombrePozo'];  

$agregarBDD = "INSERT INTO pozos (nombrePozo) 
                VALUES ('$nombrePozo')";

$resultado = mysqli_query($conexion, $agregarBDD);
    
if ($resultado) {
    ?>
    <h3>Se añadió el pozo</h3>
    <?php
    header("Location: index.php");
} 
    else {
        ?>
        <h3>Error al añadir pozo</h3>
        <?php
        header("Location: index.php");
    }

mysqli_close($conexion);
    
?>