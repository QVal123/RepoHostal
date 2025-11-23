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
        <h1>Módulo de Reservas</h1>
        <hr>
        <a href="guardarreserva.php">Crear Nuevo</a>
        <?php 
            require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/datos/conexion.php';
            require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/entidades/Reserva.php';
            require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/interfaces/IReserva.php';
            require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/logica/LReserva.php';
            $log=new LReserva();
            $reservas= $log->cargar();
        ?>
        <table border='1'>
            <thead>
                <tr>
                    <th>Id_Reserva</th>
                    <th>Id_Huesped</th>
                    <th>Id_Habitacion</th>
                    <th>Fecha_Registro</th>
                    <th>Fecha_Checkin</th>
                    <th>Fecha_Checkout</th>
                    <th>Tipo_Pago</th>
                    <th>Room_Service</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($reservas as $res){
                ?> 
                <tr>
                    <td><?=$res->getId_Reserva()?></td>
                    <td><?=$res->getId_Huesped()?></td>
                    <td><?=$res->getId_Habitacion()?></td>
                    <td><?=$res->getFecha_Registro()?></td>
                    <td><?=$res->getFecha_Checkin()?></td>
                    <td><?=$res->getFecha_Checkout()?></td>
                    <td><?=$res->getTipo_Pago()?></td>
                    <td><?=$res->getRoom_Service()?></td>

                    <td><a href="modificarreserva.php?idres=<?=$res->getId_Reserva()?>">Modificar</a></td>
                    <td><a href="borrarreserva.php?id_reserva=<?=$res->getId_Reserva()?>">Borrar</a></td>
                </tr>
                <?php
                    }       
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>