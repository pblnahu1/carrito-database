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

    // Obtengo el ID del usuario que se registró
    $id_usuario_actual = $conexion->insert_id;
    echo "ID DEL USUARIO RECIENTE: " . $id_usuario_actual . "<br>";

    // Recupero los ID de los productos almacenados en el LocalStorage
    $productosEnCarrito = array();
    foreach($_POST as $key => $value){
      // Si existe en algun lado 'producto-'
      if(strpos($key, 'id-producto-') === 0){
        $productosEnCarrito[] = json_decode($value, true);
      }
    }

    // Insertar relaciones en USERXPROD
    foreach($productosEnCarrito as $producto) {
      $id_producto = $producto['id-producto-'];
      $sql_insert_userxprod = "INSERT INTO USERXPROD (id_usuario, id_producto) VALUES('$id_usuario_actual','$id_producto')";

      if($conexion->query($sql_insert_userxprod) !== true){
        echo "Error al insertar relación USERXPROD: " . $conexion->error . "<br>";
        exit();
      }else{
        echo "Se agregó con éxito a USERXPROD<br>";
      }
    }

    if(empty($mensaje_error)){
      // header('Location: ../formulario_compra.php');
      // header('Location: insertar_json.php');
      header('Location: proceso_datos.php');
      exit();
    }
  } else {
    echo "Error: No se cargó el USUARIO: " . $conexion->error . "<br>";
  }
} else {
  echo "<p>Rellenar el formulario</p>";
}

?>


