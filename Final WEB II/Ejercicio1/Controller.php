<?php

    class controller{

        private $view;
        private $usuarioModel;
        private $empresaModel;
        private $pedidoModel;
        private $valoracionModel;

        function __construct(){
            $this->view = new view;
            $this->usuarioModel = new usuarioModel;
            $this->empresaModel = new empresaModel;
            $this->pedidoModel = new pedidoModel;
            $this->valoracionModel = new valoracionModel;
        }

        function agregarResena(){
            if(isset($_POST['id_empresa']) && isset($_POST['id_usuario']) && isset($_POST['valoracion']) && isset($_POST['resena']) && isset($_POST['inadecuada'])){
                $this->checkLoguin();
                $valoracionUsuario = $this->valoracionModel->getValoracionesUsario($_POST['id_usuario'], $_POST['id_empresa']);
                if(isset($valoracionesUsuario)){
                    $this->view->showResena("Usted ya realizo una reseña a esta empresa");
                }else{
                    $pedidoUsuario = $this->pedidoModel->pedidoUsuarioEmpresa($_POST['id_usuario'], $_POST['id_empresa']);
                    if(isset($pedidoUsuario)){
                        $this->valoracionModel->agregarValoracion($_POST['id_empresa'], $_POST['id_usuario'], $_POST['valoracion'], $_POST['resena'], $_POST['inadecuada']);

                    }else{
                        $this->view->showResena("Usted no ha realizado ningun pedido en la empresa");
                    }
                }
            }else{
                $this->view->showResena("Rellene correctamente todos los campos");
            }
        }

        function checkLoguin($idUsuario){
            session_start(); 
            if($_SESSION["ID"] != $idUsuario){
                header("Location: " .Loguin);
                die();
            }
        }
    }