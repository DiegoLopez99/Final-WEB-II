<?php

class cuentaModel{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=BancoVVBA;charset=utf8', 'root', '');
    }

    function generarCuenta($fecha, $idUsuario, $premiun){
        $num_cuenta = rand(100, 10000000);
        $sentencia = $this->db->prepare("INSERT INTO cuenta(fecha_alta, nro_cuenta, id_cliente, tipo_cuenta) VALUE (?,?,?,?)");
        $sentencia->excute(array($fecha, $num_cuenta, $idUsuario, $premiun));
    }
}