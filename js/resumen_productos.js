document.addEventListener('DOMContentLoaded', () => {
  const productosEnCarrito = Object.keys(localStorage)
    .filter(key => key.startsWith('producto-'))
    .map(key => JSON.parse(localStorage.getItem(key)));

  const contenedorResumen = document.querySelector(".contenido-resumen-compra");

  productosEnCarrito.forEach(producto => {
    const productoDiv = document.createElement("div");
    productoDiv.classList.add("producto-compra");

    productoDiv.innerHTML = `
      <p>Producto: ${producto.nombre}</p>
      <p>Precio: $${producto.precio}</p>
      <hr>
    `;
    contenedorResumen.appendChild(productoDiv);
  });
});