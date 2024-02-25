<?php

// Conexión a la BD
$conexion = new mysqli("localhost", "root", "", "carrito_database");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

?>