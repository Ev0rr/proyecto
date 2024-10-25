document.addEventListener('DOMContentLoaded', function() {
    var robotElement = document.querySelector('.robot');

    // Función para manejar el clic en el robot
    function handleClick() {
        // Alternar la clase para iniciar o detener la animación
        robotElement.classList.toggle('robot-moving');
    }

    // Agregar un evento de clic al robot
    robotElement.addEventListener('click', handleClick);
});
