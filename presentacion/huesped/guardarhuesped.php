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
    <h1>Inserción de Huesped</h1>
    <hr>
    <form action="" method="post">
    <input type="text" name="DocumentoI" placeholder="Ingrese documento de nacionalidad" required>
    <input type="text" name="Nombres" placeholder="Ingrese Nombres completos" required>
    <input type="text" name="Correo" placeholder="Ingrese su correo" required>
    <input type="text" name="Nacionalidad" placeholder="Ingrese su nacionalidad" required>
    <input type="text" name="Telefono" placeholder ="Ingrese su numero de telefono"required>
    <input type="text" name="Metodo_pago" placeholder="Ingrese tipo de pago" required>

    <button type="submit">Guardar Huesped</button>
</form>
</hr>
        </form>
    </div>
</body>
</html>

<?php
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/datos/conexion.php';
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/entidades/Huesped.php';
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/interfaces/IHuesped.php';
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/logica/LHuesped.php';
            
    if($_POST){
    $hues = new Huesped();
    $hues->setDocumentoI($_POST['DocumentoI']);
    $hues->setNombres($_POST['Nombres']);
    $hues->setCorreo($_POST['Correo']);
    $hues->setNacionalidad($_POST['Nacionalidad']);
    $hues->setTelefono($_POST['Telefono']);
    $hues->setMetodo_Pago($_POST['Metodo_pago']);
    $log = new LHuesped();
    $log->guardar($hues);

    header("Location: cargarhuesped.php");
    exit;
}
?>