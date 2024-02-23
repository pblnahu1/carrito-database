
document.addEventListener('DOMContentLoaded', () => {
  let total_productos_resumen = document.getElementById("total-resumen");
  const contenedorResumen = document.querySelector(".contenido-resumen-compra");
  let total = 0;

  const actualizar_total_resumen = () => {
    total_productos_resumen.innerText = `Total: $${total}`;
  }

  const eliminar_producto_resumen = (index) => {
    const productoDiv = document.getElementById(`id-contenedor-info-producto-${index}`);
    if (productoDiv) {
      const precio_producto = productoDiv.getAttribute('data-precio');
      total -= precio_producto;
      productoDiv.remove();
      actualizar_total_resumen();
    }
  }

  const eliminar_todos_los_productos = () => {
    contenedorResumen.innerHTML = "";
    total = 0;
    localStorage.clear();
    actualizar_total_resumen();
  }

  const productosEnCarrito = Object.keys(localStorage)
    .filter(key => key.startsWith('producto-'))
    .map(key => JSON.parse(localStorage.getItem(key)));

  productosEnCarrito.forEach((producto, index) => {

    let contenedor_info_producto = document.createElement("div");
    contenedor_info_producto.classList.add("contenedor-info-producto");
    contenedor_info_producto.id = `id-contenedor-info-producto-${index}`;
    contenedorResumen.appendChild(contenedor_info_producto);

    const productoDiv = document.createElement("div");
    productoDiv.classList.add("producto-compra");
    productoDiv.id = `producto-${index}`;
    productoDiv.setAttribute('data-precio', producto.precio);
    productoDiv.innerHTML = `
      <p>Producto: ${producto.nombre}</p>
      <p>Precio: $${producto.precio}</p>
    `;
    contenedor_info_producto.appendChild(productoDiv);

    let btn_eliminar = document.createElement("button");
    btn_eliminar.classList.add("btn-remover-producto");
    btn_eliminar.onclick = () => {
      eliminar_producto_resumen(index);
    }
    btn_eliminar.innerHTML = `
      <i class="fas fa-trash" style="color:red;"></i>
    `;
    contenedor_info_producto.appendChild(btn_eliminar);

    total += producto.precio;
    actualizar_total_resumen();
  });
  
  const boton_eliminar_todos = document.createElement("button");
  boton_eliminar_todos.innerText = "Eliminar Todos";
  boton_eliminar_todos.addEventListener("click", eliminar_todos_los_productos);
  contenedorResumen.appendChild(boton_eliminar_todos);
});

