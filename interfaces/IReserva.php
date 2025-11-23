<?php
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/entidades/Reserva.php';
    interface IReserva{
        //Definimos nuestras firmas de métodos
        public function cargar();
        public function guardar(Reserva $reserva);
        public function modificar(Reserva $reserva);
        public function borrar(Reserva $reserva);
    }
?>