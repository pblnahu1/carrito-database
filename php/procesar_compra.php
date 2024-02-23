<?php

  // Conexión a la BD
  $conexion = new mysqli("localhost", "root", "", "carrito_database");

  if($conexion->connect_error){
    die("Conexión fallida: " . $conexion->connect_error);
  }

  $nombreApellidoUsuario = $_POST['nombre_apellido_usuario_input'];
  $emailUsuario = $_POST['email_usuario_input'];
  $telefonoUsuario = $_POST['telefono_usuario_input'];
  $metodoPago = $_POST['metodo_pago_input'];

  $insertarUsuario = "INSERT INTO USUARIOS(nombre_apellido, email_usuario, telefono_usuario, metodo_pago) VALUES ('$nombreApellidoUsuario', '$emailUsuario', '$telefonoUsuario', '$metodoPago')";
  $conexion->query($insertarUsuario);

  $usuarioId = $conexion->insert_id;

  $productoId = $_POST['productoID']


?>