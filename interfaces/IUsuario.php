<?php
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/entidades/Usuario.php';
    interface IUsuario{
        //Definimos nuestras firmas de métodos
        public function cargar();
        public function guardar(Usuario $usuario);
        public function modificar(Usuario $usuario);
        public function borrar(Usuario $usuario);
    }
?>