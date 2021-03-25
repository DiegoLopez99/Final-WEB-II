<?php

class cuentaModel{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=BancoVVBA;charset=utf8', 'root', '');
    }

    function getCuentas(){
        $sentencia = $this->db->prepare("SELECT * FROM cuenta");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::fecth_obj);
    }

    function listaCuentas($id){
        $sentencia = $this->db->prepare("SELECT * FROM cuenta WHERE id_cliente=?");
        $sentencia->execute($id);
        $sentencia->fetchAll(PDO::fecth_obj);
    }

    function verificarCuentas($id){
        $cuentas = $this->getClientes();
        foreach($cuentas as $cuenta){
            if($cuenta->id_cliente = $id){
                $result = true;
            }
        }
        if(isset($result)){
            return true;
        }else{
            return false;
        }
    }

}