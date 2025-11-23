<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Modificar Reserva</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
<h1>Modificar usuario</h1>
<hr>

<form action="" method="post">
    <input type="number" name="id_usuario" placeholder="Ingrese Id de usuario" required>
    <input type="text" name="nombre_usuario" placeholder="Ingrese nombre de usuario" required>
    <input type="text" name="contrasena" placeholder="Ingrese contraseña" required>
    <input type="text" name="rol" placeholder="Ingrese cargo" required>
    <input type="submit" value="Modificar">
</form>

</body>
</html>
<?php
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/datos/conexion.php';
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/entidades/Usuario.php';
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/interfaces/IUsuario.php';
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/logica/LUsuario.php';

    if($_POST){
    $usu = new Usuario();
    $usu->setId_Usuario($_POST['id_usuario']);
    $usu->setNombre_Usuario($_POST['nombre_usuario']);
    $usu->setContrasena($_POST['contrasena']);
    $usu->setRol($_POST['rol']);
    $log = new LUsuario();
    $log->modificar($usu);

    header("Location: cargarusuario.php");
    exit;
}
?>