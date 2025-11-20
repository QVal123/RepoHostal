<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Módulo de Reservas</h1>
        <hr>
        <a href="guardarreserva.php">Crear Nuevo</a>
        <?php
            require_once '../datos/conexion.php';
            require_once '../entidades/Reserva.php';
            require_once '../interfaces/IReserva.php';
            require_once '../logica/LReserva.php';
            $log=new LReserva();
            $reservas= $log->listar();
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

                    <td><a href="modificarreserva.php">Modificar</a></td>
                    <td><a href="borrareserva.php?idres=<?= $res->getId_Reserva() ?>">Borrar</a></td>
                </tr>
                <?php
                    }       
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>