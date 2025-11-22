<?php
    class DB{
        public function conectar(){
            $url='mysql:host=localhost; dbname=new_chema';
            $user='root';
            $password='12345';
            $cn=new PDO($url, $user, $password);
            return $cn;
        }
    }
?>