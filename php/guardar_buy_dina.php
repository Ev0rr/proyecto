<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if (mysqli_connect_error()) {
    die("Conexion fallida: ".$conn->connect_error);
}

$id_producto = $_POST['id_producto'];
$stock = $_POST['stock'];
$buy = 1;

$bought = $stock-$buy;


// Actualizar el usuario en la base de datos
$sqlupdate = "UPDATE productos SET
    stock='$bought'
    WHERE id_producto='$id_producto'";

if ($conn->query($sqlupdate) === TRUE) {
    echo $bought;
} else {
    echo "Error al actualizar el producto: " . $conn->error;
}

$conn->close();
?>
