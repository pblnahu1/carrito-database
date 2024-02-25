<?php

  include("conexion.php");
  session_start();

  if(isset($_POST['enviar-datos-personales'])){
    $nombreApellidoUsuario = $_POST['nombre_apellido_usuario_input'];
    $emailUsuario = $_POST['email_usuario_input'];
    $telefonoUsuario = $_POST['tel_usuario_input'];
    $metodoPago = $_POST['metodo_pago_input'];

    $insertarUsuario = "INSERT INTO USUARIOS(nombre_apellido, email_usuario, telefono_usuario, metodo_pago) VALUES ('$nombreApellidoUsuario', '$emailUsuario', '$telefonoUsuario', '$metodoPago')";

    $resultado = mysqli_query($conexion, $insertarUsuario);

    if($resultado) {
      // $usuarioId = mysqli_insert_id($conexion);
      
      // $productosEnCarrito = json_decode($_POST['resumen-compra'], true);

      // foreach($productosEnCarrito as $producto){
      //   $productoId = $producto['id_producto'];
      //   $insertarProductoUsuario = "INSERT INTO USERXPROD(id_usuario, id_producto) VALUES('$usuarioId', '$productoId')";
      //   mysqli_query($conexion, $insertarProductoUsuario);
      // }

      $_SESSION['nombre_apellido_usuario_input'] = $nombreApellidoUsuario;
      $_SESSION['email_usuario_input'] = $emailUsuario;
      
      header('Location:../formulario_compra.php');
      exit();
    }else{
      ?>
      <h3 style="text-align:center; color:red;">Rellene los campos</h3> 
      <?php
    }
  }

  /*$requestData = json_decode(file_get_contents('php://input'), true);

  if(isset($requestData['usuario']) && isset($requestData['productos'])){
    echo $requestData['usuario']['nombres'];

    $userData = $requestData['usuario'];

    $nombres = mysqli_real_escape_string($conexion,$userData['nombres']);
    $email = mysqli_real_escape_string($conexion, $userData['email']);
    $telefono = mysqli_real_escape_string($conexion, $userData['telefono']);
    $metodoPago = mysqli_real_escape_string($conexion, $userData['metodoPago']);

    $sqlInsertUser = "INSERT INTO USUARIOS(nombre_apellido, email_usuario, telefono_usuario, metodo_pago) VALUES('$nombres','$email','$telefono','$metodoPago')";
    $resultInsertUser = mysqli_query($conexion, $sqlInsertUser);

    if($resultInsertUser) {
      $userId = mysqli_insert_id($conexion);

      $productosEnCarrito = $requestData['productos'];

      foreach ($productosEnCarrito as $producto) {
        $productId = $producto['id_producto'];

        $productId = mysqli_real_escape_string($conexion, $productId);

        $sqlInsertUserXProd ="INSERT INTO USERXPROD(id_usuario, id_producto) VALUES('$userId','$productId')";
        $resultInsertUserXProd = mysqli_query($conexion, $sqlInsertUserXProd);

        if(!$resultInsertUserXProd) {
          echo json_encode(['error' => 'Error al insertar productos en USERXPROD']);
          exit();
        }

      
      }

      echo json_encode(['mensaje' => 'Compra finalizada con éxito']);

    }else{
      echo json_encode(['error' => 'Error al insertar usuario en USUARIOS']);

    }


  echo 'Datos recibidos en el servidor:';
  var_dump($requestData);
  }else{
    echo json_encode(['error' => 'Datos incompletos']);
  
  }*/

  
?>