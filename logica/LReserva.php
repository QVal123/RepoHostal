<?php
    require_once '../datos/DB.php';
    require_once '../entidades/Reserva.php';
    require_once '../interfaces/IReserva.php';
    class LReserva implements IReserva{
        public function buscar(){
            $db=new DB(); //declaramos nuestra instancia DB para consumir el método conectar
            $cn=$db->conectar(); //obtenemos la conexión que retorna nuestro método
            $sql="select * from reservas"; //consulta a ejecutar
            $ps=$cn->prepare($sql); //preparamos la query
            $ps->execute(); //ejecutamos la query
            $filas=$ps->fetchAll(); //obtenemos todas las filas de la ejecución
            $reservas= array(); //declaramos una lista de tamaño dinámico
            foreach($filas as $r){ //iteramos nuestras filas
                $res=new Reserva(); //declaramos un objeto de tipo reservas para setearle nuestra fila
                $res->getId_Reserva($r[0]);
                $res->getId_Huesped($r[1]);
                $res->getId_Habitacion($r[2]);
                $res->getFecha_Registro($r[3]);
                $res->getFecha_Checkin($r[4]);
                $res->getFecha_Checkout($r[5]);
                $res->getTipo_Pago($r[6]);
                $res->getRoom_Service($r[7]);
                array_push($reservas, $res); //agregamos nuestro objeto con la fila seteada a nuestra lista de familias
            }
            return $reservas; //devolvemos el listado de familias poblado
        }
            public function registrar(){
            $db=new DB(); //declaramos nuestra instancia DB para consumir el método conectar
            $cn=$db->conectar(); //obtenemos la conexión que retorna nuestro método
            $sql="INSERT INTO reservas (id_huesped, id_habitacion, fecha_registro, fecha_checkin, fecha_checkout, tipo_pago)
                VALUES (?,?,?,?,?,?)"; //consulta a ejecutar
            $ps=$cn->prepare($sql); //preparamos la query
            $ps->execute([ //ejecutamos la query
                $res->getId_Reserva(),
                $res->getId_Huesped(),
                $res->getId_Habitacion(),
                $res->getFecha_Registro(),
                $res->getFecha_Checkin(),
                $res->getFecha_Checkout(),
                $res->getTipo_Pago(),
                $res->getRoom_Service()
            ]);
            return $reservas; //devolvemos el listado de familias poblado
        }
    }
?>