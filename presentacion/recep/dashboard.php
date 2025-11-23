<?php
session_start();
if (!isset($_SESSION["Rol"]) || $_SESSION["Rol"] !== "Recepcionista") {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
    <meta charset="UTF-8">
    <title>Panel Recepcionista</title>
    <link rel="stylesheet" href="recep.css">
</head>

<body>
    <div class="container">
        <h1>Panel de Recepción</h1>
        <p>Hola, <?php echo $_SESSION["Nombre_Usuario"]; ?> 👋</p>

        <div class="card-container">
            <a href="#" class="card">Registrar Cliente</a>
            <a href="#" class="card">Registrar Venta</a>
            <a href="#" class="card">Ver Productos</a>
        </div>

        <a class="btn" href="../logout.php">Cerrar Sesión</a>
    </div>
</body>
</html>
