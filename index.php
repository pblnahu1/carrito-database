<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carrito Database</title>
  <!-- iconos fontawesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
  <header>
    <div id="id-title-header">
      <p class="parrafo-title">Carrito Database</p>
    </div>
    <nav id="id-nav-bar" class="nav-bar">
      <button id="id-btn-nav-carrito" class="nav-link" title="Agregados al carrito">
        <i class="fas fa-shopping-cart">
          <div id="numero">0</div>
        </i>
      </button>

      <div id="id-mi-div-carrito" class="mi-div-carrito">
        <div id="id-contenedor-carrito" class="contenedor-carrito">
          <!-- Productos Agregados -->
          <span class="msg-carrito" style="font-weight: bold;">No tienes nada agregado al carrito. ¡Agrega ahora!</span>
        </div>
        <div id="id-contenedor-total-btn" class="contenedor-total-btn">
          <div id="id-total-compra" class="total-compra">
            Total: $0
          </div>
          <a href="formulario_compra.php" id="id-btn-finalizar-compra" class="btn-finalizar-compra" target="_self">
            Continuar Compra
          </a>
        </div>
      </div>
    </nav>
  </header>

  <main>
    <div id="container-productos">

    </div>
  </main>

  <footer>
    Carrito Database
  </footer>

  <script src="./js/app.js" defer></script>
</body>

</html>