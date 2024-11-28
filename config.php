<?php
$host = "localhost";
$usuario = "root";
$contrasena = "";
$base_de_datos = "'db_autosiglo_v2'";

$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}