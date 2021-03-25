<?php

    class controller{

        private $view;
        private $clienteModel;
        private $cuentaModel;
        private $operacionModel;

        function __construct(){
            $this->view = new view;
            $this->clienteModel = new clienteModel;
            $this->cuentaModel = new cuentaModel;
            $this->opercionModel = new opercionModel;
        }

        function addCliente(){
            if(!empty($_POST['nombre']) && !empty($_POST['dni']) && !empty($_POST['telefono']) && !empty($_POST['direccion']) && !empty($_POST['premiun'])){
                $existeDni = $this->clienteModel->verificarDNI($_POST['dni']);
                if($existeDni == false){
                    $idCliente = $this->clienteModel->addCliente($_POST['nombre'], $_POST['dni'], $_POST['telefono'], $_POST['direccion'], $_POST['premiun']);
                    $this->cuentaModel->generarCuenta(getDate(), $idCliente, $_POST['premiun']);
                    if($_POST['premiun'] == 1){
                        $this->operacionModel->depositoPremiun($idCliente);
                    }
                }else{
                    $this->view->showRegistro("Ya existe un usuario con el DNI ingresado");
                }
                
            }else{
                $this->view->showRegistro("Complete los campos correctamente");
            }
        }

    }