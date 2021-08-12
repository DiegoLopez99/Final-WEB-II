<?php

    class OperacionModel{
        private $db;

        function __construc(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=BancoVVBA;charset=utf8', 'root', '');
        }

        function transferencia($idCuentaOrigen, $idCuentaDestino, $monto){
            $fecha = getdate();
            $sentencia = $this->db->prepare('INSERT INTO operacion (monto, fecha, tipo_operacion, id_cuenta) VALUES (?,?,?,?)');
            $sentencia->execute(array($monto, $fecha, 1, $idCuentaOrigen));
            $sentencia2 = $this->db->prepare('INSERT INTO operacion (monto, fecha, tipo_operacion, id_cuenta) VALUES (?,?,?,?)');
            $sentencia2->execute(array($monto, $fecha, 2, $idCuentaDestino));
        }
    }