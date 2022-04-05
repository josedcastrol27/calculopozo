<?php

include_once("conexion.php");

$nombrePozo = $_POST['nombrePozo'];
$medicion = $_POST['medicion'];
$fecha = $_POST['fecha'];

$agregarBDD = "INSERT INTO propiedades (nombrePozo, medidas, fecha) 
                VALUES ('$nombrePozo', '$medicion', '$fecha')";

$resultado = mysqli_query($conexion, $agregarBDD);

mysqli_close($conexion);

header("Location: index.php");

?>