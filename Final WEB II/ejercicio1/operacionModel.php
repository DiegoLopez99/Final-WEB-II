<?php

class operacionModel{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=BancoVVBA;charset=utf8', 'root', '');
    }

    function depositoPremiun($id_cuenta){
        $monto = 10000;
        $fecha = getDate();
        $sentencia = $this->db->prepare("INSERT INTO operacion(monto, fecha, tipo_operacion, id_cuenta) VALUES (?,?,?,?)");
        $sentencia->execute($monto, $fecha, 2, $id_cuenta);
    }
}