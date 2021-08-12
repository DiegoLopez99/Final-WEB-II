<?php

    class valoracionModel{
        private $db;

        function __construct(){
            $this->db = new PDO('mysql:host=localhost;'.'dbname=db_teneloYa;charset=utf8', 'root', '');
        }

        function getValoracionesUsuario($id_usuario, $id_empresa){
            $sentencia = $this->db->prepare('SELECT * FROM VALORACION WHERE id_usuario = ? AND id_empresa=?');
            $sentencia->execute(array($id_usuario, $id_empresa));
            return $sentencia->fetch(PDO::FETCH_OBJ);
        }

        function agregarValoracion($id_empresa, $id_usuario, $valoracion, $resena, $inadecuada){
            $sentencia = $this->db->prepare('INSERT INTO VALORACION(id_empresa, id_usuario, valoracion, resena, inadecuado) VALUES(?,?,?,?,?)');
            $sentencia->execute(array($id_empresa, $id_usuario, $valoracion, $resena, $inadecuada));
        }

    }