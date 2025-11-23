<?php
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/datos/conexion.php';
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/entidades/Usuario.php';
    require_once 'C:/APACHE_SINDY TRABAJOS/apache/Apache24/htdocs/RepoHostal/interfaces/IUsuario.php';
    class LUsuario implements IUsuario{
        public function cargar(){
            $db=new DB(); //declaramos nuestra instancia DB para consumir el método conectar
            $cn=$db->conectar(); //obtenemos la conexión que retorna nuestro método
            $sql="select * from usuarios"; //consulta a ejecutar
            $ps=$cn->prepare($sql); //preparamos la query
            $ps->execute(); //ejecutamos la query
            $filas=$ps->fetchAll(); //obtenemos todas las filas de la ejecución
            $usuarios= array(); //declaramos una lista de tamaño dinámico
            foreach($filas as $f){ //iteramos nuestras filas
                $usu=new Usuario(); //declaramos un objeto de tipo familia para setearle nuestra fila
                $usu->setId_Usuario($f[0]);
                $usu->setNombre_Usuario($f[1]);
                $usu->setContrasena($f[2]);
                $usu->setRol($f[3]);
                array_push($usuarios, $usu); //agregamos nuestro objeto con la fila seteada a nuestra lista de familias
            }
            return $usuarios; //devolvemos el listado de familias poblado
        }
        public function guardar(Usuario $usuario){
            $db=new DB();
            $cn=$db->conectar();
            $sql="insert into usuarios (nombre_usuario, contrasena, rol) values (:nom, :cont, :rol)";
            $ps=$cn->prepare($sql);
            $ps->bindValue(':nom', $usuario->getNombre_Usuario());
            $ps->bindValue(':cont', $usuario->getContrasena());
            $ps->bindValue(':rol', $usuario->getRol());
            $ps->execute();
        }
        public function modificar(Usuario $usuario){
            $db = new DB();
            $cn = $db->conectar();
            $sql = "UPDATE usuarios SET nombre_usuario= :nom, contrasena= :cont, rol= :rol WHERE id_usuario = :id";
            $ps = $cn->prepare($sql);
            $ps->bindParam(':nom', $usuario->getNombre_Usuario());
            $ps->bindParam(':cont', $usuario->getContrasena());
            $ps->bindParam(':rol', $usuario->getRol());
            $ps->bindParam(':id', $usuario->getId_Usuario());
            $ps->execute();
    }
        public function borrar(Usuario $usuario){
            $db=new DB();
            $cn=$db->conectar();
            $sql="delete from usuarios where id_usuario=:id_usuario";
            $ps=$cn->prepare($sql);
            $ps->bindParam(':id_usuario', $usuario->getId_Usuario());
            $ps->execute();
        }
    }
?>