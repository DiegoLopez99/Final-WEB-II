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

        function tablaResumen($params = null){
            $id = $params[':ID'];
            $existeCliente = $this->clienteModel->verificarCliente($id);
            $tieneCuentas = $this->cuentaModel->verificarCuentas($id);
            $listaCuentas = $this->cuentaModel->cuentasDeCliente($id);
            foreach($listaCuentas as $cuenta){
                $operacionesCuenta += $this->operacionesModel->getOperacionesCuenta($cuenta->id);
            }
            if($existeCliente == true){
                if($tieneCuentas){
                    $this->view->showTabla($listaCuentas, $operacionesCuenta);
                }else{
                    $this->view->showTabla("El cliente ingresado no tiene cuentas vinculadas");
                }
            }else{
                $this->view->showTabla("El cliente ingresado no existe");
            }
            
        }
    }    