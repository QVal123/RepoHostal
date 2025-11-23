<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Modificar Datos del Huesped</title>
</head>
<body>
<h1>Modificar Datos del Huesped</h1>
<hr>

    <form action="" method="post">
    <input type="num" name="Id_huesped" placeholder="Id Reserva" requiered>
    <input type="text" name="DocumentoI" placeholder="Ingrese documento de nacionalidad" required>
    <input type="text" name="Nombres" placeholder="Ingrese Nombres completos" required>
    <input type="text" name="Correo" placeholder="Ingrese su correo" required>
    <input type="text" name="Nacionalidad" placeholder="Ingrese su nacionalidad" required>
    <input type="text" name="Telefono" placeholder ="Ingrese su numero de telefono"required>
    <input type="text" name="Metodo_pago" placeholder="Ingrese tipo de pago" required>
    <input type="submit" value="Modificar">
</form>
</body>
</html>
<?php
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/datos/conexion.php';
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/entidades/Huesped.php';
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/interfaces/IHuesped.php';
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/logica/LHuesped.php';
    
if($_POST){
    $hues = new Huesped();
    $hues->setId_Huesped($_POST['Id_huesped']);
    $hues->setDocumentoI($_POST['DocumentoI']);
    $hues->setNombres($_POST['Nombres']);
    $hues->setCorreo($_POST['Correo']);
    $hues->setNacionalidad($_POST['Nacionalidad']);
    $hues->setTelefono($_POST['Telefono']);
    $hues->setMetodo_Pago($_POST['Metodo_pago']);
    $log = new LHuesped();
    $log->modificar($hues);

    header("Location: cargarhuesped.php");
    exit;
}
?>