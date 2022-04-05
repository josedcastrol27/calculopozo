<?php

include_once("conexion.php");

$eliminar = $_GET['pozo'];

$sentencia = "DELETE FROM pozos WHERE nombrePozo='$eliminar'";
mysqli_query($conexion, $sentencia);

$sentencia2 = "DELETE FROM propiedades WHERE nombrePozo='$eliminar'";
mysqli_query($conexion, $sentencia2);

mysqli_close($conexion);

header("Location: index.php");

?>