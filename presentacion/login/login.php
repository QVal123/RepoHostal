<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- La siguiente linea es para utilizar la hoja de estilos -->
    <link rel="stylesheet" href="estilo.css">
    <title>login</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <form action="logincontroller.php" method="post">
        <input name="nombre_usuario" type="text" placeholder="Escribe tu nombre de usuario">
        <br><br>
        <input name="contrasena" type="password" placeholder="Contraseña">
        <br><br>
        <input type="submit" value="Iniciar sesión">
        <?php if (isset($_GET['error'])): ?>
    <div class="error">
        Las credenciales del usuario no existen
    </div>
    </form>
<?php endif; ?>
</body>
</html>