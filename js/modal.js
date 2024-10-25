document.addEventListener('DOMContentLoaded', function () {
    const resumenList = document.querySelector('#resumen-list');
    const seleccionados = {}; // Mantenemos un registro de los productos seleccionados
    let tuComputadoraAgregada = false; // Variable para rastrear si "Tu computadora" ha sido agregada

    function actualizarResumen() {
        resumenList.innerHTML = ''; // Limpiamos la lista antes de agregar los nuevos elementos
        let total = 0;

        for (const id in seleccionados) {
            const product = seleccionados[id];
            if (product) {
                const listItem = document.createElement('li');
                listItem.innerHTML = `
                    <div class="product-info">
                        <div class="product-text">
                            <h3>${product.name}</h3>
                            <p>${product.description}</p>
                        </div>
                        <div class="product-price">$${product.price}</div>
                    </div>
                `;
                resumenList.appendChild(listItem);
                total += product.price;
            }
        }

        // Actualizamos el precio total
        const totalElement = document.createElement('li');
        totalElement.classList.add('total');
        totalElement.textContent = `Total: $${total}`;
        resumenList.appendChild(totalElement);
    }

    function agregarAlResumen(listId, productName, productDescription, productPrice) {
        seleccionados[listId] = { name: productName, description: productDescription, price: productPrice };
        actualizarResumen();
    }

    const botones = document.querySelectorAll('.boton');

    botones.forEach((boton, index) => {
        const modal = document.getElementById(`modal-${index + 1}`);
        const selectedList = document.getElementById(`selected-list-${index + 1}`);
        const listId = `selected-list-${index + 1}`;

        seleccionados[listId] = null; // Inicializamos el registro

        boton.addEventListener('click', () => {
            modal.style.display = 'flex';
        });

        modal.addEventListener('click', (e) => {
            if (e.target.classList.contains('product-image')) {
                const productName = e.target.alt;
                const productDescription = e.target.dataset.description || "Descripción no disponible"; // Obtenemos la descripción del atributo data-description
                const productPrice = parseFloat(e.target.dataset.precio || 0);

                seleccionados[listId] = { name: productName, description: productDescription, price: productPrice }; // Actualizamos el producto seleccionado

                modal.style.display = 'none';

                // Limpiamos la lista de selecciones
                selectedList.innerHTML = '';

                // Actualizamos el resumen
                agregarAlResumen(listId, productName, productDescription, productPrice);

                // Añadido para mostrar la imagen seleccionada en el botón
                const listItem = document.createElement('li');
                listItem.style.backgroundImage = `url(${e.target.src})`;
                listItem.style.backgroundSize = 'cover';
                listItem.style.width = '270px';
                listItem.style.height = '200px';
                listItem.style.borderRadius = '20px';
                listItem.style.alignContent = 'center';
                listItem.style.marginBottom = '10px';
                boton.querySelector('.list').innerHTML = '';
                boton.querySelector('.list').appendChild(listItem);
            }
        });
    });

    const closeModalBtns = document.querySelectorAll('.close-btn');

    closeModalBtns.forEach((closeBtn) => {
        closeBtn.addEventListener('click', () => {
            const modal = closeBtn.closest('.modal');
            modal.style.display = 'none';
        });
    });

    const agregarAlCarritoBtn = document.getElementById('carrito-btn');

    agregarAlCarritoBtn.addEventListener('click', () => {
        if (!tuComputadoraAgregada) {
            // Almacenamos la lista de productos seleccionados en sessionStorage
            sessionStorage.setItem('productosSeleccionados', JSON.stringify(seleccionados));

            const total = calcularTotal(); // Función que calcula el total
            sessionStorage.setItem('total', total); // También almacenamos el total en sessionStorage

            window.location.href = 'carrito.html'; // Ir a la página del carrito
        }
    });

});
