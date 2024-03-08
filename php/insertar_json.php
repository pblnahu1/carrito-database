<?php

include("conexion.php");

$json = file_get_contents('../js/productos.json');

if ($json === false) {
  echo "Error al cargar el archivo JSON.";
  exit;
}
$productos = json_decode($json, true);
if ($productos === null) {
  echo "Error al decodificar el JSON.";
  exit;
}

foreach ($productos as $producto) {
  $id = $producto['id'];
  $nombre = $producto['nombre'];
  $precio = $producto['precio'];

  $sql = "INSERT INTO PRODUCTOS(id_producto, nombre_producto, precio_producto) VALUES('$id','$nombre', '$precio')";

  if ($conexion->query($sql) === TRUE) {
    echo "<br>Producto insertado correctamente: ID: <em>$id</em>, PRODUCTO: <em>$nombre</em>, PRECIO: <em>$precio</em><br>";
  } else {
    echo "Error al insertar PRODUCTO: " . $conexion->error;
  }
}
