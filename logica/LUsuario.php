<?php
    require_once '../datos/DB.php';
    require_once '../entidades/Usuario.php';
    require_once '../interfaces/IUsuario.php';
    class LUsuario implements IUsuario{
        public function buscar(){
            $db=new DB(); //declaramos nuestra instancia DB para consumir el método conectar
            $cn=$db->conectar(); //obtenemos la conexión que retorna nuestro método
            $sql="select * from usuarios"; //consulta a ejecutar
            $ps=$cn->prepare($sql); //preparamos la query
            $ps->execute(); //ejecutamos la query
            $filas=$ps->fetchAll(); //obtenemos todas las filas de la ejecución
            $usuarios= array(); //declaramos una lista de tamaño dinámico
            foreach($filas as $f){ //iteramos nuestras filas
                $fam=new Usuario(); //declaramos un objeto de tipo familia para setearle nuestra fila
                $fam->getId_Usuario($f[0]);
                $fam->getContraseña($f[1]);
                $fam->getRol($f[2]);
                array_push($usuarios, $usu); //agregamos nuestro objeto con la fila seteada a nuestra lista de familias
            }
            return $usuarios; //devolvemos el listado de familias poblado
        }
    }
?>