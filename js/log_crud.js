// login.js
function login() {
    var email = $('#loginEmail').val();
    var password = $('#loginPassword').val();

    // Validate inputs
    if (!email || !password) {
        alert("Por favor, complete todos los campos.");
        return;
    }

    // Send login request to server
    $.ajax({
        type: 'POST',
        url: 'login_process.php',
        data: {
            email: email,
            password: password
        },
        success: function (response) {
            if (response === "success") {
                alert("Inicio de sesión exitoso.");
                window.location.href = 'crud_page.php'; // Redirect to CRUD page
            } else {
                alert("Inicio de sesión fallido. Verifique sus credenciales.");
            }
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
            alert("Error al procesar la solicitud de inicio de sesión.");
        }
    });
}
