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

    header('Location:insertarJSON.php');
    exit();
  } else {
    echo "Error: No se cargó el USUARIO";
  }
} else {
  echo "<br>Error: No se pudo enviar los datos del formulario. Revisar.";
}

$conexion->close();


/*$id_producto_insertado = $conexion->insert_id;

$sql_insert_userxprod = "INSERT INTO USERXPROD(id_usuario, id_producto) VALUES('$id_usuario_actual','$id_producto_insertado')";

if ($conexion->query($sql_insert_userxprod) === TRUE) {
echo "Relación USERXPROD insertada correctamente.<br>";
} else {
echo "Error al insertar relacion USERXPROD: " . $conexion->error;
}*/
?>


