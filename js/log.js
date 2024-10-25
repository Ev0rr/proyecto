// Define los botones
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');

// Define el contenedor
const container = document.getElementById('container');

// Evento de clic del botón de registro
signUpButton.addEventListener('click', () => {
container.classList.add("right-panel-active");
});

// Evento de clic del botón de inicio de sesión
signInButton.addEventListener('click', () => {
container.classList.remove("right-panel-active");
});
