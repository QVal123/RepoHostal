<?php
class Huesped {
    private $id_huesped;
    private $documentoI;
    private $nombres;
    private $correo;
    private $nacionalidad;
    private $telefono;
    private $metodo_pago;
    public function getId_Huesped(){
        return $this->id_huesped;
    }
    public function setId_Huesped($id_huesped){
    $this->id_huesped=$id_huesped;
    }
    public function getDocumentoI(){
    return $this->documentoI;
    }
    public function setDocumentoI($documentoI){
        $this->documentoI=$documentoI;
    }
    public function getNombres(){
        return $this->nombres;
    }
    public function setNombres($nombres){
        $this->nombres=$nombres;
    }
    public function getCorreo(){
        return $this->correo;
    }
    public function setCorreo($correo){
        $this->correo=$correo;
    }
    public function getNacionalidad(){
        return $this->nacionalidad;
    }
    public function setNacionalidad($nacionalidad){
        $this->nacionalidad=$nacionalidad;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    public function setTelefono($telefono){
        $this->telefono=$telefono;
    }
    public function getMetodo_Pago(){
        return $this->metodo_pago;
    }
    public function setMetodo_Pago($metodo_pago){
        $this->metodo_pago=$metodo_pago;
    }
}