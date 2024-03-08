const btn_carrito_header = document.getElementById("id-btn-nav-carrito");
const mi_contenedor_carrito = document.getElementById("id-mi-div-carrito");

const mi_contenedor_productos_main = document.getElementById("container-productos"); // los productos del <main>
const mi_contenedor_productos_agregados_carrito = document.getElementById("id-contenedor-carrito"); // será para los productos q se agreguen al carrito

let txt_total_productos = document.getElementById("id-total-compra");

const mostrar_ventana_carrito = () => {
  btn_carrito_header.addEventListener("click", (event) => {
    event.stopPropagation(); //  para evitar que el clic se propague
    setTimeout(() => {
      mi_contenedor_carrito.style.display = mi_contenedor_carrito.style.display === "none" ? "block" : "none";
    }, 0);
  });
}

const productos_json_main = () => {
  document.addEventListener('DOMContentLoaded', () => {
    fetch('js/productos.json')
      .then(response => response.json())
      .then(data => {
        for (let i = 0; i < data.length; i++) {
          let productos = data[i];

          let cards = document.createElement("div");
          cards.classList.add("card");
          mi_contenedor_productos_main.appendChild(cards);

          let cards2 = document.createElement("div");
          cards2.classList.add("card2");
          cards.appendChild(cards2);

          let new_content_name = document.createElement("div");
          new_content_name.classList.add("product-main-name");
          new_content_name.id = `name-${productos.nombre}-${i}`;
          cards2.appendChild(new_content_name);

          let product_name = document.createElement("p");
          product_name.textContent = productos.nombre;
          new_content_name.appendChild(product_name);

          let new_content_price = document.createElement("div");
          new_content_price.classList.add("content-price");
          new_content_price.id = `price-${productos.precio}-${i}`;
          cards2.appendChild(new_content_price);

          let price = document.createElement("p");
          price.textContent = `$${productos.precio}`;
          new_content_price.appendChild(price);

          let new_content_buttons = document.createElement("div");
          new_content_buttons.classList.add("content-buttons");
          new_content_buttons.id = `button-${productos.nombre}-${i}`;
          cards2.appendChild(new_content_buttons);

          let btn_carrito = document.createElement("button");
          btn_carrito.classList.add("btn-agregar-carrito", "botones-productos");
          btn_carrito.id = `boton-${productos.nombre}-carrito-${i}`;
          btn_carrito.innerHTML = `
            <i class="fa-solid fa-cart-shopping"></i>
            <span>Agregar al carrito</span>
          `;
          new_content_buttons.appendChild(btn_carrito);
        }
      })
      .catch(error => console.error('No ha sido posible agregar productos al main desde el JSON', error));
  });
}

const productos_agregados_json = () => {
  document.addEventListener('DOMContentLoaded', () => {
    fetch('js/productos.json')
      .then(response => response.json())
      .then(data => {
        let botones_carrito = document.querySelectorAll('.btn-agregar-carrito');
        const msg_carrito = document.querySelector(".msg-carrito");
        const boton_comprar = document.getElementById("id-btn-finalizar-compra");
        let total = 0;
        let productos_agregados_count = 0;

        if (botones_carrito.length > 0) {
          botones_carrito.forEach((boton, index) => {
            boton.addEventListener('click', () => {
              agregarAlCarrito(boton, index);
            });
          });
        } else {
          console.warn("La NodeList de botones para agregar al carrito está vacía");
        }

        const agregarAlCarrito = (boton, index) => {
          const producto = data[index];
          msg_carrito.style.display = "none";
          if (producto) {
            let contenido_producto_carrito = document.createElement("div");
            contenido_producto_carrito.classList.add('productos-carrito');
            contenido_producto_carrito.id = `id-prod-carrito-${index}`;
            mi_contenedor_productos_agregados_carrito.appendChild(contenido_producto_carrito);

            let contenedor_info_carrito = document.createElement("div");
            contenedor_info_carrito.classList.add('div-info-carrito', 'prod-carr');
            contenedor_info_carrito.id = "id-info-carrito";
            contenido_producto_carrito.appendChild(contenedor_info_carrito);

            let contenedor_nombre_precio_producto = document.createElement("div");
            contenedor_nombre_precio_producto.classList.add('div-nombre-precio-producto');
            contenedor_nombre_precio_producto.id = "id-nombre-precio-producto";
            contenedor_nombre_precio_producto.innerHTML = `
              <span class="span-nombre">${producto.nombre}</span>
              <span class="span-precio">$${producto.precio}</span>
            `;
            contenedor_info_carrito.appendChild(contenedor_nombre_precio_producto);

            let contenedor_btn_eliminar_producto_carrito = document.createElement("div");
            contenedor_btn_eliminar_producto_carrito.classList.add('div-btn-eliminar-producto-carrito');
            contenedor_btn_eliminar_producto_carrito.id = "id-btn-eliminar-producto-carrito";
            contenedor_info_carrito.appendChild(contenedor_btn_eliminar_producto_carrito);

            let boton_remover_producto = document.createElement("button");
            boton_remover_producto.classList.add("btn-remover-producto");
            boton_remover_producto.onclick = () => {
              eliminarProductoCarrito(index);
            }
            boton_remover_producto.innerHTML = `
              <i class="fas fa-trash" style="color:red;"></i>
            `;
            contenedor_btn_eliminar_producto_carrito.appendChild(boton_remover_producto);

            // let precio_producto = parseFloat(`${producto.precio}`);
            let precio_producto = producto.precio;
            total += precio_producto;
            productos_agregados_count++;
            numero_productos_agregados();
            actualizarTotal();

            console.info(`Agregado al carrito:\nID del Botón: '${boton.id}',\nNombre Producto: '${producto.nombre}',\níndice: [${index}]`);

            console.log(producto);

            // Almaceno productos en localStorage
            localStorage.setItem(`id-producto-${index}`, JSON.stringify(producto));
          } else {
            console.warn(`No se encontró el producto correspondiente al índice [${index}]`);
          }
        }

        const numero_productos_agregados = () => {
          let numeroDiv = document.getElementById('numero');
          numeroDiv.textContent = productos_agregados_count;
        }

        const actualizarTotal = () => {
          txt_total_productos.innerText = `Total: $${total}`;
        }

        const eliminarProductoCarrito = (index) => {
          const productoEliminado = data[index];
          let producto_eliminado = document.getElementById(`id-prod-carrito-${index}`);
          let precio_eliminado = productoEliminado.precio;
          total -= precio_eliminado;
          productos_agregados_count--;
          numero_productos_agregados();
          actualizarTotal();
          if (producto_eliminado) {
            producto_eliminado.remove();
            const productos_en_carrito = document.querySelectorAll('.productos-carrito');
            if (productos_en_carrito.length === 0) {
              msg_carrito.style.display = "block";
            }

            console.info(`Se ha eliminado del carrito el Producto '${productoEliminado.nombre}'.`);
          } else {
            console.warn(`No ha sido posible eliminar el producto '${productoEliminado.nombre}' del carrito.`);
          }
        }

        boton_comprar.addEventListener("click", function (event) {
          event.preventDefault();
          let urlResumenCompra = this.getAttribute("href");
          window.location.href = urlResumenCompra;
        });
      })
      .catch(error => console.error('No se pudo agregar los productos al carrito desde el JSON', error));
  });
}


const render = () => {
  mostrar_ventana_carrito();
  productos_json_main();
  productos_agregados_json();
}

render();
 
