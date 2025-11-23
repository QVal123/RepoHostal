<?php
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/datos/conexion.php';
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/entidades/Huesped.php';
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/interfaces/IHuesped.php';
    class LHuesped implements IHuesped{
        public function cargar(){
            $db=new DB(); //declaramos nuestra instancia DB para consumir el método conectar
            $cn=$db->conectar(); //obtenemos la conexión que retorna nuestro método
            $sql="select * from huespedes"; //consulta a ejecutar
            $ps=$cn->prepare($sql); //preparamos la query
            $ps->execute(); //ejecutamos la query
            $filas=$ps->fetchAll(); //obtenemos todas las filas de la ejecución
            $huespedes= array(); //declaramos una lista de tamaño dinámico
            foreach($filas as $f){ //iteramos nuestras filas
                $hues=new Huesped(); //declaramos un objeto de tipo reservas para setearle nuestra fila
                $hues->setId_Huesped($f[0]);
                $hues->setDocumentoI($f[1]);
                $hues->setNombres($f[2]);
                $hues->setCorreo($f[3]);
                $hues->setNacionalidad($f[4]);
                $hues->setTelefono($f[5]);
                $hues->setMetodo_Pago($f[6]);
                array_push($huespedes, $hues); //agregamos nuestro objeto con la fila seteada a nuestra lista de familias
            }
            return $huespedes; //devolvemos el listado de familias poblado
        }
        public function guardar(Huesped $huesped){
            $db=new DB();
            $cn=$db->conectar();
            $sql="insert into huespedes (documentoI, nombres, correo, nacionalidad, telefono, metodo_pago) values (:docu, :nom, :correo, :naci, :telefono, :pago)";
            $ps=$cn->prepare($sql);
            $ps->bindValue(':docu', $huesped->getDocumentoI());
            $ps->bindValue(':nom', $huesped->getNombres());
            $ps->bindValue(':correo', $huesped->getCorreo());
            $ps->bindValue(':naci', $huesped->getNacionalidad());
            $ps->bindValue(':telefono', $huesped->getTelefono());
            $ps->bindValue(':pago', $huesped->getMetodo_Pago());
            $ps->execute();
        }
        public function modificar(Huesped $huesped){
            $db = new DB();
            $cn = $db->conectar();
            $sql = "UPDATE huespedes SET documentoI= :docu, nombres= :nom, correo= :correo, nacionalidad= :naci, telefono= :telefono, metodo_pago = :pago WHERE id_huesped = :id";
            $ps = $cn->prepare($sql);
            $ps->bindParam(':docu', $huesped->getDocumentoI());
            $ps->bindParam(':nom', $huesped->getNombres());
            $ps->bindParam(':correo', $huesped->getCorreo());
            $ps->bindParam(':naci', $huesped->getNacionalidad());
            $ps->bindParam(':telefono', $huesped->getTelefono());
            $ps->bindParam(':pago', $huesped->getMetodo_Pago());
            $ps->bindParam(':id', $huesped->getId_Huesped());
            $ps->execute();
    }
            public function borrar(Huesped $huesped){
            $db=new DB();
            $cn=$db->conectar();
            $sql="delete from huespedes where id_huesped=:id_huesped";
            $ps=$cn->prepare($sql);
            $ps->bindParam(':id_huesped', $huesped->getId_Huesped());
            $ps->execute();
        }
    }
?>