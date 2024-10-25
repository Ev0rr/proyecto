<?php

  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "1234";
  $dbname = "cotizaciones";

  $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

  if ($conn->connect_error) {
    die("No hay conexión: " . $conn->connect_error);
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['precio']) && isset($_POST['stock'])) {
      
    // Obtener los datos del formulario
    
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    // Preparar la consulta para insertar un nuevo usuario
    $sql = "INSERT INTO productos (nombre, descripcion, precio, stock) VALUES ('$nombre', '$descripcion', '$precio', '$stock')";

    if (mysqli_query($conn, $sql)) {
        echo "Producto agregado correctamente";
    } else {
        echo "Error al agregar el producto: " . mysqli_error($conn);
    }
  }
  echo "poop";
?>
