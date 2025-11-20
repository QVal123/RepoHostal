<?php
    require_once '../entidades/Reserva.php';
    interface IReserva{
        //Definimos nuestras firmas de métodos
        public function buscar();
        public function eliminar();
        public function modificar();
        public function registrar();
        public function listar();
    }
?>