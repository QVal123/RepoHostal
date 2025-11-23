<?php
class Usuario {
    private $id_usuario;
    private $nombre_usuario;
    private $contrasena;
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
    public function getContrasena(){
        return $this->contrasena;
    }
    public function setContraseña($contrasena){
        $this->contrasena=$contrasena;
    }
    public function getRol(){
        return $this->rol;
    }
    public function setRol($rol){
        $this->rol=$rol;
    }
}