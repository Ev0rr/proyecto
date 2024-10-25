
<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login";


$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
	die("No hay conexión: ".$conn->connect_error);
}

$sql="SELECT * FROM productos";
$result=$conn->query($sql);

// Generar la tabla de usuarios con acciones de edición y eliminación
if($result->num_rows > 0) {
    while ($row = $result -> Fetch_assoc()) {
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
                    \"{$row['stock']}\")'>
                <button onclick='eliminarUsuario(\"{$row['id_producto']}\")'>
                <button onclick='mostrarBUY(\"{$row['id_producto']}\",\"{$row['stock']}\")'>BUY</button>
            </td>

        </tr>";
    }
} else {
    echo "<tr><td colspan='8'>No hay usuarios</td></tr>";
}
$conn->close();
?>
