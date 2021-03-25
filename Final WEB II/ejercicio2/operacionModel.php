<?php

class operacionModel{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=BancoVVBA;charset=utf8', 'root', '');
    }

    function getOperaciones(){
        $sentencia = $this->db->prepare("SELECT * FROM operacion");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::fecth_obj);
    }

    function getOperacionesCuenta($id){
        $sentencia = $this->db->prepare("SELECT * FROM operacione WHERE id_cuenta=?");
        $sentencia->execute($id);
        return $sentencia->fetchAll(PDO::fecth_obj);
    }

}