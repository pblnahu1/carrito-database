<?php

include("conexion.php");

if (isset($_POST['enviar-datos-personales'])) {
  $nombreApellidoUsuario = $_POST['nombre_apellido_usuario_input'];
  $emailUsuario = $_POST['email_usuario_input'];
  $telefonoUsuario = $_POST['tel_usuario_input'];
  $metodoPago = $_POST['metodo_pago_input'];

  $insertarUsuario = "INSERT INTO USUARIOS(nombre_apellido, email_usuario, telefono_usuario, metodo_pago) VALUES ('$nombreApellidoUsuario', '$emailUsuario', '$telefonoUsuario', '$metodoPago')";

  $resultado = mysqli_query($conexion, $insertarUsuario);

  echo "Datos personales enviados correctamente a la BD<br>";

  if ($resultado) {
    echo "Usuario insertado correctamente: NOMBRE Y APELLIDO: <em>$nombreApellidoUsuario</em>, EMAIL: <em>$emailUsuario</em>, TELEFONO: <em>$telefonoUsuario</em>, METODO PAGO: <em>$metodoPago</em><br>";

    $id_usuario_actual = $conexion->insert_id;
    echo "ID DEL USUARIO RECIENTE: " . $id_usuario_actual . "<br>";

    header('Location:insertarJSON.php');
    exit();
  } else {
    echo "Error: No se cargó el USUARIO";
  }

  $idUsuario = $conexion->insert_id;
  $idProducto = $conexion->insert_id; // Arreglar para configurar el ID del producto agregado

  $sql_insert_userxprod = "INSERT INTO USERXPROD (id_usuario, id_producto) VALUES('$idUsuario','$idProducto')";
  if($conexion->query($sql_insert_userxprod) === TRUE){
    echo "Relación USERXPROD insertada correctamente.";
  }else{
    echo "Error al insertar relación USERXPROD: " . $conexion->error;
  }
} else {
  echo "<br>Error: No se pudo enviar los datos del formulario. Revisar.";
}

?>


