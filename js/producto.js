document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.boton');
    const modals = document.querySelectorAll('.modal');

    buttons.forEach((button, index) => {
        button.addEventListener('click', () => {
            modals[index].style.display = 'block';
        });
    });

    const closeButtons = document.querySelectorAll('.close-btn');

    closeButtons.forEach((closeButton, index) => {
        closeButton.addEventListener('click', () => {
            modals[index].style.display = 'none';
        });
    });
});
