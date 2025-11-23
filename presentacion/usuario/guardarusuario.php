<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
    <h1>Inserción de Usuarios</h1>
    <hr>
    <form action="" method="post">
    <input type="text" name="Nombre_Usuario" placeholder="Ingrese Nombres completos" required>
    <input type="text" name="Contrasena" placeholder="Ingrese su contraseña" required>
    <input type="text" name="Rol" placeholder="Ingrese su Cargo" required>
    <button type="submit">Guardar Usuario</button>
</form>

</hr>
    </div>
</body>
</html>

<?php
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/datos/conexion.php';
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/entidades/Usuario.php';
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/interfaces/IUsuario.php';
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/logica/LUsuario.php';
            
    if($_POST){
    $usu = new Usuario();
    $usu->setNombre_Usuario($_POST['Nombre_Usuario']);
    $usu->setContrasena($_POST['Contrasena']);
    $usu->setRol($_POST['Rol']);
    $log = new LUsuario();
    $log->guardar($usu);

    header("Location: cargarusuario.php");
    exit;
}
?>