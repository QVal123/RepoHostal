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
        <h1>Módulo de Usuarios</h1>
        <hr>
        <a href="guardarusuario.php">Crear Nuevo</a>
        <?php 
            require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/datos/conexion.php';
            require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/entidades/Usuario.php';
            require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/interfaces/IUsuario.php';
            require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/logica/LUsuario.php';
            $log=new LUsuario();
            $usuarios= $log->cargar();
        ?>
        <table border='1'>
            <thead>
                <tr>
                    <th>Id_Usuario</th>
                    <th>Nombre_Usuario</th>
                    <th>Contraseña</th>
                    <th>Rol</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($usuarios as $usu){
                ?> 
                <tr>
                    <td><?=$usu->getId_Usuario()?></td>
                    <td><?=$usu->getNombre_Usuario()?></td>
                    <td><?=$usu->getContrasena()?></td>
                    <td><?=$usu->getRol()?></td>

                    <td><a href="modificarusuario.php?id_usuario=<?=$usu->getId_Usuario()?>">Modificar</a></td>
                    <td><a href="borrarusuario.php?id_usuario=<?=$usu->getId_Usuario()?>">Borrar</a></td>
                </tr>
                <?php
                    }       
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
