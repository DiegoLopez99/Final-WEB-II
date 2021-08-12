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

        function marcarEmprPremiun(){
            if(isset($_POST['input_numero'])){
                $numero = $_POST['input_numero'];
                $empresas = $this->empresaModel->getEmpresas();
                foreach($empresas as $empresa){
                    $valoracionesEmpresa = $this->valoracionModel->valoracionesEmpresa($empresa->id);
                    $filas = 0;
                    $sumaTotal = 0;
                    foreach($valoracionesEmpresa as $valoracion){
                        $sumaTotal = $sumaTotal + $valoracion->valoracion;
                        $filas+1;
                    }
                    $promedio = $sumaTotal / $filas;
                    if($promedio > $numero){
                        $this->empresaModel->hacerPremiun($empresa->id);
                    }
                }
            }
        }
    }