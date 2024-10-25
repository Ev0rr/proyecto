document.getElementById('mostrar-ocultar-lista').addEventListener('click', function() {
    var lista = document.getElementById('resumen-list');
    var boton = document.getElementById('agregar-carrito-btn');

    if (lista.style.display === 'none') {
        lista.style.display = 'block';
        boton.style.marginTop = '10px';
    } else {
        lista.style.display = 'none';
        boton.style.marginTop = '50px'; // ajustar este valor según las necesidades
    }
});