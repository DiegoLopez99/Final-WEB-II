<?php
 
    class usuarioModel{
        private $db;

        function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=db_teneloYa;charset=utf8', 'root', '');
        }

        function getUsuarios(){
            $sentencia = $this->db->prepare("SELECT * FROM USUARIO");
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        }
    }