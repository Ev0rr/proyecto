<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/Login.css">
    <title>Login</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="./php/login.php" method="post">
                <h1>Crear una cuenta</h1>
                <input type="hidden" name="accion" value="registro"> <!-- Campo oculto para indicar que es un registro -->
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>o utiliza tu correo electrónico para registrarte</span>
                <input type="text" name="usuario" placeholder="Usuario">
                <input type="email" name="correo" placeholder="Correo">
                <input type="password" name="contrasena" placeholder="Contraseña">
                <button type="submit">INSCRIBIRSE</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form id="login-form" action="../php/login.php" method="post">
                <h1>Iniciar sesión</h1>
                <input type="hidden" name="accion" value="login"> <!-- Campo oculto para indicar que es un inicio de sesión -->
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>o utiliza tu contraseña de correo electrónico</span>
                <input type="text" name="usuario" placeholder="Usuario">
                <input type="email" name="correo" placeholder="Correo">
                <input type="password" name="contrasena" placeholder="Contraseña">
                <a href="#">¿Olvidaste tu contraseña?</a>
                <button type="submit">Iniciar sesión</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>¡Bienvenido de nuevo!</h1>
                    <p>Ingrese sus datos personales para utilizar todas las funciones del sitio.</p>
                    <button class="hidden" id="login">Iniciar sesión</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>¡Hola!, bienvenido.</h1>
                    <p>Regístrate con tus datos personales para tener todas las promociones de Hopper. </p>
                    <button class="hidden" id="register">INSCRIBIRSE</button>
                </div>
            </div>
        </div>
    </div>
    <script src="js/login.js"></script>
</body>

</html>
