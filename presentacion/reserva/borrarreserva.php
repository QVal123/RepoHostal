<?php
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/datos/conexion.php';
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/entidades/Reserva.php';
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/interfaces/IReserva.php';
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/logica/LReserva.php';

    $res=new Reserva();
    $res->setId_Reserva($_GET['id_reserva']);
    $log=new LReserva();
    $log->borrar($res);
    header('Location: cargarreserva.php');
?>