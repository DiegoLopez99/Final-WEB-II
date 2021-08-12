<?php

class clienteModel{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=BancoVVBA;charset=utf8', 'root', '');
    }

    function getClientes(){
        $sentencia = $this->db->prepare("SELECT * FROM cliente ");
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::fecth_obj);
    }

    function addCliente($nombre, $dni, $telefono, $direccion, $premiun){
        $sentencia = $this->db->prepare("INSERT INTO cliente(nombre, dni, telefono, direccion, premiun VALUE (?,?,?,?,?)");
        $sentencia->execute(array($nombre, $dni, $telefono, $direccion, $premiun));
        return $this->db->lastInsertId();
    }

    function verificarDNI($DNI){
        $clientes = $this->db->getClientes();
        foreach($clientes as $cliente){
            if($cliente->dni == $DNI){
                return true;
            }else{
                return false;
            }
        }
        
    }
}