<?php

$usuario = "root";     // usuario de la BD
$clave = "12345";      // contraseña
$basedatos = "new_chema";  // nombre de la BD

try {

    // Conexión a la BD
    $con = new PDO(
        "mysql:host=localhost;dbname=".$basedatos,
        $usuario,
        $clave
    );

    echo "Pasó la prueba";

} catch (Exception $e) {

    echo "Error de conexión: " . $e->getMessage();

}

?>