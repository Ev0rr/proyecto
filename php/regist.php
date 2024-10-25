<?php
session_start();

$servidor = "localhost";
$usuario_db = "root";
$contra_db = "";
$basedatos = "login";

$conn = new mysqli($servidor, $usuario_db, $contra_db, $basedatos);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if (isset($_POST['nombre'], $_POST['correo'], $_POST['contrasena'])) {
    $nombre = htmlspecialchars($_POST['nombre']);
    $correo = filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL);
    $contrasena = $_POST['contrasena'];

    // Utilizar una consulta preparada
    $sql = "INSERT INTO usuario (nombre, correo, contrasena) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Vincular parámetros
    $stmt->bind_param("sss", $nombre, $correo, $contrasena);

    if ($stmt->execute()) {
        echo "Registro exitoso. <a href='../regist_exitoso.php'>Iniciar sesión</a>";
    } else {
        echo "Error en el registro: " . $conn->error;
    }

    $stmt->close();
} else {
    echo "Campos de registro no presentes. <a href='../fallo_registro.php'>Intentar de nuevo</a>";
}

$conn->close();
?>
