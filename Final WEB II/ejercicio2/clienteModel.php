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

    function verificarCliente($id){
        $clienes = $this->getClientes();
        foreach($clientes as $cliente){
            if($cliente->id = $id){
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