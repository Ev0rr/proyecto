<?php

//Este es un comentario.

$nombre = "Pedro ";
$apellido = "Torres";
$naci = 1999;
$estado_atual = 2023;
// operaciones.matematicas 
$edad = $estado_atual - $naci;


//echo $nombre;
// Con la etiqueta de br se da el salto de linea: echo "<br>";
// echo "<br>";
// Con el " . ", concatenas al imprimir.

// echo "Hola, soy ".$nombre." mi apellido es " . $apellido. " y tengo ".$edad." años."
//echo "<br>";

//echo $edad;
//echo " años";
// echo "Hola, mundo!";x

// Condiciones:
$edad_legal = 18;
//$edad = 24; // Asigna un valor a $edad

if ($edad >= $edad_legal) {
    echo "Eres mayor de edad, puedes tomar! Tu edad es: " . $edad;
} else {
    echo "No puedes tomar, tu edad es: " . $edad;
}


?>


