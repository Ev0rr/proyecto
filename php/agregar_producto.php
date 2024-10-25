<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("No hay conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre']) && isset($_POST['descripcion']) &&isset ($_POST['precio']) && isset($_POST['stock'])) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio=$_POST['precio'];
    $stock =$_POST['stock'];

    // Prevenir inyecciones SQL
    $nombre = mysqli_real_escape_string($conn, $nombre);
    $descripcion = mysqli_real_escape_string($conn, $descripcion);

    // Consulta preparada para prevenir inyecciones SQL
    $stmt = $conn->prepare("INSERT INTO inventario (nombre, descripcion, precio, stock) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssi", $nombre, $descripcion, $precio, $stock);

    if ($stmt->execute()) {
        echo "Producto agregado correctamente";
    } else {
        // Cambié el mensaje de error para ser más descriptivo
        echo "Error al agregar el producto: " . $stmt->error;
    }

    $stmt->close();
} else {
    // Cambié el mensaje para indicar que no se recibieron datos adecuados
    echo "Error: Datos insuficientes para agregar el producto.";
}

$conn->close();
?>
<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("No hay conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['precio']) && isset($_POST['stock'])) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    // Prevenir inyecciones SQL
    $nombre = mysqli_real_escape_string($conn, $nombre);
    $descripcion = mysqli_real_escape_string($conn, $descripcion);

    // Consulta preparada para prevenir inyecciones SQL
    $stmt = $conn->prepare("INSERT INTO inventario (nombre, descripcion, precio, stock) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssi", $nombre, $descripcion, $precio, $stock);

    if ($stmt->execute()) {
        echo "Producto agregado correctamente";
    } else {
        // Cambié el mensaje de error para ser más descriptivo
        echo "Error al agregar el producto: " . $stmt->error;
    }

    $stmt->close();
} else {
    // Cambié el mensaje para indicar que no se recibieron datos adecuados
    echo "Error: Datos insuficientes para agregar el producto.";
}

$conn->close();
?>
<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("No hay conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['precio'])  && isset($_POST['stock'])) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    // Prevenir inyecciones SQL
    $nombre = mysqli_real_escape_string($conn, $nombre);
    $descripcion = mysqli_real_escape_string($conn, $descripcion);

    // Consulta preparada para prevenir inyecciones SQL
    $stmt = $conn->prepare("INSERT INTO inventario (nombre, descripcion, precio, stock) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssi", $nombre, $descripcion, $precio, $stock);

    if ($stmt->execute()) {
        echo "Producto agregado correctamente";
    } else {
        // Cambié el mensaje de error para ser más descriptivo
        echo "Error al agregar el producto: " . $stmt->error;
    }

    $stmt->close();
} else {
    // Cambié el mensaje para indicar que no se recibieron datos adecuados
    echo "Error: Datos insuficientes para agregar el producto.";
}

$conn->close();
?>
<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login";

$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($conn->connect_error) {
    die("No hay conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['precio']) && isset($_POST['stock'])) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    // Prevenir inyecciones SQL
    $nombre = mysqli_real_escape_string($conn, $nombre);
    $descripcion = mysqli_real_escape_string($conn, $descripcion);

    // Consulta preparada para prevenir inyecciones SQL
    $stmt = $conn->prepare("INSERT INTO inventario (nombre, descripcion, precio, stock) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssi", $nombre, $descripcion, $precio, $stock);

    if ($stmt->execute()) {
        echo "Producto agregado correctamente";
    } else {
        // Cambié el mensaje de error para ser más descriptivo
        echo "Error al agregar el producto: " . $stmt->error;
    }

    $stmt->close();
} else {
    // Cambié el mensaje para indicar que no se recibieron datos adecuados
    echo "Error: Datos insuficientes para agregar el producto.";
}

$conn->close();
?>
