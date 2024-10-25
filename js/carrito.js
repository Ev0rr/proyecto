document.addEventListener('DOMContentLoaded', function () {
    const productosSeleccionados = JSON.parse(sessionStorage.getItem('productosSeleccionados')) || {};
    const cartContainer = document.getElementById('cart-container');
    const resumenList = document.getElementById('resumen-list');
    const subtotalElement = document.getElementById('subtotal');
    const envioElement = document.getElementById('envio');
    const totalElement = document.getElementById('total');

    let cantidadTotal = 0; // Variable para almacenar la cantidad total de productos

    for (const id in productosSeleccionados) {
        const product = productosSeleccionados[id];

        const cartItem = document.createElement('div');
        cartItem.classList.add('cart-item');
        cartItem.innerHTML = `
            <img src="${product.image}" alt="${product.name}">
            <div class="item-details">
                <h3>${product.name}</h3>
                <p>${product.description}</p>
                <p>Precio: $${product.price.toFixed(2)}</p>
                <input type="number" value="${product.quantity}" min="1" class="quantity-input">
                <button class="remove-button">Eliminar</button>
            </div>
        `;
        cartContainer.appendChild(cartItem);

        const listItem = document.createElement('li');
        listItem.innerHTML = `
            <span>${product.name}</span>
            <span>${product.quantity}</span>
        `;
        resumenList.appendChild(listItem);

        cantidadTotal += product.quantity; // Sumar la cantidad de cada producto

        const removeButton = cartItem.querySelector('.remove-button');
        removeButton.addEventListener('click', function () {
            cantidadTotal -= product.quantity; // Restar la cantidad al eliminar un producto
            delete productosSeleccionados[id];
            sessionStorage.setItem('productosSeleccionados', JSON.stringify(productosSeleccionados));
            location.reload();
        });

        const quantityInput = cartItem.querySelector('.quantity-input');
        quantityInput.addEventListener('change', function () {
            cantidadTotal += parseInt(quantityInput.value) - product.quantity; // Actualizar la cantidad total
            product.quantity = parseInt(quantityInput.value);
            sessionStorage.setItem('productosSeleccionados', JSON.stringify(productosSeleccionados));
            location.reload();
        });
    }

    const subtotal = Object.values(productosSeleccionados).reduce((acc, product) => acc + (product.price * product.quantity), 0);
    const envio = 5.00;
    const total = subtotal + envio;

    subtotalElement.textContent = `Subtotal: $${subtotal.toFixed(2)}`;
    envioElement.textContent = `Envío: $${envio.toFixed(2)}`;
    totalElement.textContent = `Total: $${total.toFixed(2)}`;

    // Actualizar la cantidad total en algún elemento de tu HTML
    const cantidadTotalElement = document.getElementById('cantidad-total');
    if (cantidadTotalElement) {
        cantidadTotalElement.textContent = `Cantidad Total: ${cantidadTotal}`;
    }
});
