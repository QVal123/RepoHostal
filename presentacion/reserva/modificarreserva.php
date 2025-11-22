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
<h1>Modificar Reserva</h1>
<hr>

<form action="" method="post">
    <input type="number" name="id_reserva" placeholder="Ingrese Id de Reserva" required>
    <input type="number" name="id_huesped" placeholder="Ingrese Id del huesped" required>
    <input type="number" name="id_habitacion" placeholder="Ingrese Id de la habitacion" required>
    <input type="date" name="fecha_registro" required>
    <input type="date" name="fecha_checkin" required>
    <input type="date" name="fecha_checkout" required>
    <input type="text" name="tipo_pago" placeholder="Ingrese tipo de pago" required>
    <input type="text" name="room_service" placeholder="Ingrese servicio" required>
    <input type="submit" value="Modificar">
</form>

</body>
</html>
<?php
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/datos/conexion.php';
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/entidades/Reserva.php';
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/interfaces/IReserva.php';
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/logica/LReserva.php';

    if($_POST){
    $res = new Reserva();
    $res->setId_Reserva($_POST['id_reserva']);
    $res->setId_Huesped($_POST['id_huesped']);
    $res->setId_Habitacion($_POST['id_habitacion']);
    $res->setFecha_Registro($_POST['fecha_registro']);
    $res->setFecha_Checkin($_POST['fecha_checkin']);
    $res->setFecha_Checkout($_POST['fecha_checkout']);
    $res->setTipo_Pago($_POST['tipo_pago']);
    $res->setRoom_Service($_POST['room_service']);
    $log = new LReserva();
    $log->modificar($res);

    header("Location: cargarreserva.php");
    exit;
}
?>