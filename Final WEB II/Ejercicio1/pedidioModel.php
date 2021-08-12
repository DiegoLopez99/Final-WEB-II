<?php
 
    class pedidoModel{
        private $db;

        function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=db_teneloYa;charset=utf8', 'root', '');
        }

        function pedidoUsuarioEmpresa($idUsuario, $idEmpresa){
            $sentencia = $this->db->prepare('SELECT * FROM PEDIDO WHERE id_usuario=? AND id_empresa=?');
            $sentencia->execute(array($idUsuario, $idEmpresa));
            return $sentencia->fetch(PDO::FETCH_OBJ);
        }
    }