<?php
 
    class empresaModel{
        private $db;

        function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=db_teneloYa;charset=utf8', 'root', '');
        }

        function getEmpresas(){
            $sentencia = $this->db->prepare("SELECT * FROM EMPRESA");
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        }

        function hacerPremiun($id){
            $sentencia = $this->db->prepare("UPDATE EMPRESA SET premiun=TRUE WHERE id=?");
            $sentencia->execute($id);
        }
    }