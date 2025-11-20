<?php
class Usuario {
    private $id_reserva;
    private $id_huesped;
    private $id_habitacion;
    private $fecha_registro;
    private $fecha_checkin;
    private $fecha_checkout;
    private $tipo_pago;
    private $room_service;

    public function getId_Reserva(){
        return $this->id_reserva;
    }
    public function setId_Reserva($id_reserva){
        $this->id_reserva=$id_reserva;
    }
    public function getId_Huesped(){
        return $this->id_huesped;
    }
    public function setId_Huesped($id_huesped){
        $this->id_huesped=$id_huesped;
    }
    public function getId_Habitacion(){
        return $this->id_habitacion;
    }
    public function setId_Habitacion($id_habitacion){
        $this->id_habitacion=$id_habitacion;
    }
    public function getFecha_Registro(){
        return $this->fecha_registro;
    }
    public function setFecha_Registro($fecha_registro){
        $this->fecha_registro=$fecha_registro;
    }
    public function getFecha_Checkin(){
        return $this->fecha_checkin;
    }
    public function setFecha_Checkin($fecha_checkin){
        $this->fecha_checkin=$fecha_checkin;
    }
    public function getFecha_Checkout(){
        return $this->fecha_checkout;
    }
    public function setFecha_Checkout($fecha_checkout){
        $this->fecha_checkout=$fecha_checkout;
    }
    public function getTipo_Pago(){
        return $this->tipo_pago;
    }
    public function setTipo_Pago($tipo_pago){
        $this->tipo_pago=$tipo_pago;
    }
    public function getRoom_Service(){
        return $this->room_service;
    }
    public function setRoom_Service($room_service){
        $this->room_service=$room_service;
    }
}