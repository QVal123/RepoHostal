<?php
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/datos/conexion.php';
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/entidades/Reserva.php';
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/interfaces/IReserva.php';
    class LReserva implements IReserva{
        public function cargar(){
            $db=new DB(); //declaramos nuestra instancia DB para consumir el método conectar
            $cn=$db->conectar(); //obtenemos la conexión que retorna nuestro método
            $sql="select * from reservas"; //consulta a ejecutar
            $ps=$cn->prepare($sql); //preparamos la query
            $ps->execute(); //ejecutamos la query
            $filas=$ps->fetchAll(); //obtenemos todas las filas de la ejecución
            $reservas= array(); //declaramos una lista de tamaño dinámico
            foreach($filas as $f){ //iteramos nuestras filas
                $res=new Reserva(); //declaramos un objeto de tipo reservas para setearle nuestra fila
                $res->setId_Reserva($f[0]);
                $res->setId_Huesped($f[1]);
                $res->setId_Habitacion($f[2]);
                $res->setFecha_Registro($f[3]);
                $res->setFecha_Checkin($f[4]);
                $res->setFecha_Checkout($f[5]);
                $res->setTipo_Pago($f[6]);
                $res->setRoom_Service($f[7]);
                array_push($reservas, $res); //agregamos nuestro objeto con la fila seteada a nuestra lista de familias
            }
            return $reservas; //devolvemos el listado de familias poblado
        }
        public function guardar(Reserva $reserva){
            $db=new DB();
            $cn=$db->conectar();
            $sql="insert into reservas (id_huesped, id_habitacion, fecha_registro, fecha_checkin, fecha_checkout, tipo_pago, room_service) values (:idhuesped, :idhabi, :registro, :checkin, :checkout, :tipo, :room)";
            $ps=$cn->prepare($sql);
            $ps->bindValue(':idhuesped', $reserva->getId_Huesped());
            $ps->bindValue(':idhabi', $reserva->getId_Habitacion());
            $ps->bindValue(':registro', $reserva->getFecha_Registro());
            $ps->bindValue(':checkin', $reserva->getFecha_Checkin());
            $ps->bindValue(':checkout', $reserva->getFecha_Checkout());
            $ps->bindValue(':tipo', $reserva->getTipo_Pago());
            $ps->bindValue(':room', $reserva->getRoom_Service());
            $ps->execute();
        }
        public function modificar(Reserva $reserva){
            $db = new DB();
            $cn = $db->conectar();
            $sql = "UPDATE reservas SET id_huesped= :idhuesped, id_habitacion = :idhabi, fecha_registro = :registro, fecha_checkin = :checkin, fecha_checkout = :checkout, tipo_pago = :tipo, room_service = :room WHERE id_Reserva = :id";
            $ps = $cn->prepare($sql);
            $ps->bindParam(':idhuesped', $reserva->getId_Huesped());
            $ps->bindParam(':idhabi', $reserva->getId_Habitacion());
            $ps->bindParam(':registro', $reserva->getFecha_Registro());
            $ps->bindParam(':checkin', $reserva->getFecha_Checkin());
            $ps->bindParam(':checkout', $reserva->getFecha_Checkout());
            $ps->bindParam(':tipo', $reserva->getTipo_Pago());
            $ps->bindParam(':room', $reserva->getRoom_Service());
            $ps->bindParam(':id', $reserva->getId_Reserva());
            $ps->execute();
    }
            public function borrar(Reserva $reserva){
            $db=new DB();
            $cn=$db->conectar();
            $sql="delete from reservas where id_reserva=:id_reserva";
            $ps=$cn->prepare($sql);
            $ps->bindParam(':id_reserva', $reserva->getId_Reserva());
            $ps->execute();
        }
    }
?>