<?php
class Usuario {
    private $id_usuario;
    private $nombre_usuario;
    private $contraseña;
    private $rol;

    public function getId_Usuario(){
        return $this->id_usuario;
    }
    public function setId_Usuario($id_usuario){
        $this->id_usuario=$id_usuario;
    }
    public function getNombre_Usuario(){
        return $this->id_usuario;
    }
    public function setNombre_Usuario($nombre_usuario){
        $this->nombre_usuario=$nombre_usuario;
    }
    public function getContraseña(){
        return $this->contraseña;
    }
    public function setContraseña($contraseña){
        $this->contraseña=$contraseña;
    }
    public function getRol(){
        return $this->rol;
    }
    public function setRol($contraseña){
        $this->rol=$rol;
    }
}