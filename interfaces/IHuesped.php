<?php
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/entidades/Huesped.php';
    interface IHuesped{
        //Definimos nuestras firmas de métodos
        public function cargar();
        public function guardar(Huesped $huesped);
        public function modificar(Huesped $huesped);
        public function borrar(Huesped $huesped);
    }
?>