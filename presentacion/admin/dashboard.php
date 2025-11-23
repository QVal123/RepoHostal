<?php
session_start();
if (!isset($_SESSION["Rol"]) || $_SESSION["Rol"] !== "Administrador") {
    header("Location: ../login.php");
    exit();
}
session_destroy();  
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Administrador</title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <div class="container">
        <h1>Panel de Administrador</h1>
        <p>Bienvenido, <?php echo $_SESSION["Nombre_Usuario"]; ?> 👋</p>

        <div class="card-container">
            <a href="#" class="card">Gestionar Usuarios</a>
            <a href="#" class="card">Reportes del Sistema</a>
            <a href="#" class="card">Configuraciones</a>
        </div>

        <a class="btn" href="../logout.php">Cerrar Sesión</a>
    </div>
</body>
</html>
