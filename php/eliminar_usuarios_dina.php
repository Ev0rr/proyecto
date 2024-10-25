<?php

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "login";

    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    if (mysqli_connect_error()) {
        die("Conexion fallida: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_producto'])) {
        $id_producto = $_POST['id_producto'];

        // Eliminar el usuario
        $sql_delete = "DELETE FROM productos WHERE id_producto = $id_producto";

        if ($conn->query($sql_delete) === TRUE) {
            echo "Producto eliminado correctamente";

        // Reiniciar el contador AUTO_INCREMENT
    $conn->query("ALTER TABLE `productos` AUTO_INCREMENT = 1");
        } else {
            echo "Error al eliminar el producto: " . $conn->error;
        }
    }

    $conn->close();
?>
