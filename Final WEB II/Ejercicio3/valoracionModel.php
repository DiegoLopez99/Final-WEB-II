<?php

    class valoracionModel{
        private $db;

        function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=db_teneloYa;charset=utf8', 'root', '');
        }

        function getValoraciones(){
            $sentencia = $this->db->prepare("SELECT * FROM VALORACION");
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        }
    }