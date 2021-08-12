<?php

    class CuentaModel{
        private $db;

        function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=BancoVVBA;charset=utf8', 'root', '');
        }

        function getCuenta($idCliente){
            $sentencia = $this->db->prepare('SELECT * FROM cuenta WHERE id_cliente=?');
            $sentencia->execute($idCliente);
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        }
    }