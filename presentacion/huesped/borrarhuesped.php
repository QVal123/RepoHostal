<?php
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/datos/conexion.php';
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/entidades/Huesped.php';
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/interfaces/IHuesped.php';
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/logica/LHuesped.php';

    $hues=new Huesped();
    $hues->setId_Huesped($_GET['id_huesped']);
    $log=new LHuesped();
    $log->borrar($hues);
    header('Location: cargarhuesped.php');
?>