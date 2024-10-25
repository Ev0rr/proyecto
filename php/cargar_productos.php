<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("No hay conexión: " . $conn->connect_error);
}

$sql = "SELECT * FROM productos";
$result = $conn->query($sql);

// Generar la tabla de productos con acciones de edición y eliminación
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['id_producto']}</td>
            <td>{$row['nombre']}</td>
            <td>{$row['descripcion']}</td>
            <td>{$row['precio']}</td>
            <td>{$row['stock']}</td>

            <td>
                <button onclick='mostrarEditarProducto(
                    \"{$row['id_producto']}\", 
                    \"{$row['nombre']}\",
                    \"{$row['descripcion']}\",
                    \"{$row['precio']}\",
                    \"{$row['stock']}\")'>Editar</button>
                <button onclick='eliminarProducto(\"{$row['id_producto']}\")'>Eliminar</button>
            </td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='5'>No hay productos</td></tr>";
}
$conn->close();
?>
