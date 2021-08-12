<?php

    class ClienteModel{
        private $db;

        function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=BancoVVBA;charset=utf8', 'root', '');
        }

        function getCliente($dni){
            $sentencia = $this->db->prepare('SELECT * FROM cliente WHERE dni=?');
            $sentencia->execute($dni);
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        }
    }