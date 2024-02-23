<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resumen de Compra</title>
  <link rel="stylesheet" href="./css/form.css">
  <link rel="stylesheet" href="./css/styles.css">
  <!-- iconos fontawesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
  <header>
    <div id="id-title-header">
      <p class="parrafo-title">Carrito Database</p>
    </div>
    <nav id="id-nav-bar" class="nav-bar">
      <a href="index.php" id="id-btn-volver-atras" class="btn-volver-atras nav-link">Inicio</a>
      <button id="id-btn-ayuda-nav" class="btn-ayuda-nav nav-link">Ayuda</button>
    </nav>
  </header>
  <main>
    <div class="container">
      <form class="form">
        <div class="descr">Contactanos</div>
        <div class="input">
          <input required="" autocomplete="off" type="text" name="nombre_apellido_usuario_input">
          <label for="name">Nombre y Apellido</label>
        </div>

        <div class="input">
          <input required="" autocomplete="off" name="email_usuario_input" type="text">
          <label for="email">E-mail</label>
        </div>

        <div class="input">
          <input required="" autocomplete="off" name="tel_usuario_input" type="tel">
          <label for="tel">Teléfono Celular</label>
        </div>

        <div class="input input-select">
          <label for="message">¿Cómo pagás?</label>
          <select id="select-pagos" name="metodo_pago_input">
            <option value="">Seleccionar</option>
            <option value="Efectivo">Efectivo</option>
            <option value="Tarjeta de Crédito">Tarjeta de Crédito</option>
            <option value="Tarjeta de Débito">Tarjeta de Débito</option>
          </select>

        </div>
        <button>Finalizar Compra →</button>
      </form>
    </div>

    <div id="contenedor-resumen" class="container">
      <div class="descr">Resumen de Compra</div>
      <div class="contenido-resumen-compra">

      </div>
      <div class="descr" id="total-resumen">Total: $0</div>
    </div>
  </main>
  <footer>
    <div id="id-title-header">
      <p class="parrafo-title">Carrito Database</p>
    </div>
  </footer>

  <script src="./js/resumen_productos.js" defer></script>
</body>

</html>