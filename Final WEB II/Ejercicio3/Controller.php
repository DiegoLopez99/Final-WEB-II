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

        function tablaResumen(){
            $usuarios = $this->usuarioModel->getUSuarios();
            $resenas = $this->valoracionModel->getValoraciones();
            $this->view->showTablaResenas($usuarios, $resenas);
        }
    }