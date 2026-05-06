<?php
$host = "";
$usuario = "grupo2";
$password = "12345";
$base_datos = "registro"; // 👈 CAMBIA ESTE NOMBRE

$mysqli = new mysqli($host, $usuario, $password, $base_datos);

// Verificar conexión
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

// Opcional: para evitar problemas con acentos
$mysqli->set_charset("utf8");
?>