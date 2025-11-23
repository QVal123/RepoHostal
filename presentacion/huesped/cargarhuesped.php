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
        <h1>Módulo de Huesped</h1>
        <hr>
        <a href="guardarhuesped.php">Crear Nuevo</a>
        <?php 
            require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/datos/conexion.php';
            require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/entidades/Huesped.php';
            require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/interfaces/IHuesped.php';
            require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/logica/LHuesped.php';
            $log=new LHuesped();
            $huespedes= $log->cargar();
        ?>
        <table border='1'>
            <thead>
                <tr>
                    <th>Id_Huesped</th>
                    <th>DocumentoI</th>
                    <th>Nombres</th>
                    <th>Correo</th>
                    <th>Nacionalidad</th>
                    <th>Telefono</th>
                    <th>Metodo_Pago</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($huespedes as $hues){
                ?> 
                <tr>
                    <td><?=$hues->getId_Huesped()?></td>
                    <td><?=$hues->getDocumentoI()?></td>
                    <td><?=$hues->getNombres()?></td>
                    <td><?=$hues->getCorreo()?></td>
                    <td><?=$hues->getNacionalidad()?></td>
                    <td><?=$hues->getTelefono()?></td>
                    <td><?=$hues->getMetodo_Pago()?></td>

                    <td><a href="modificarhuesped.php?id_huesped=<?=$hues->getId_Huesped()?>">Modificar</a></td>
                    <td><a href="borrarhuesped.php?id_huesped=<?=$hues->getId_Huesped()?>">Borrar</a></td>
                </tr>
                <?php
                    }       
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
