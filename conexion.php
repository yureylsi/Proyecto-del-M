<?php
$conexion = new mysqli("localhost", "grupo2", "12345", "registro");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
