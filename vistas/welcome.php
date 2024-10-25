<?php

session_start();

//verificar si el usuario ha iniciado sesion
if(!isset($_SESSION['username'])){
    header("location: ../log.php");
    session_destroy();  
    exit();
} 
//mostrar el mensaje de bienvenida si el usuario ha
//echo "bienvenido, " . $_SESSION['username'] . "!<br>"


?>