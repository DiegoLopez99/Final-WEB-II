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
            if(isset($existeCliente) && $existeCliente == true){
                $tieneCuentas = $this->cuentaModel->verificarCuentas($id);
                if(isset($tieneCuentas) && $tieneCuentas == true){
                    $listaCuentas = $this->cuentaModel->cuentasDeCliente($id);
                    foreach($listaCuentas as $cuenta){
                        $operacionesCuenta += $this->operacionesModel->getOperacionesCuenta($cuenta->id);
                        $saldoCuentas += $this->saldoCuenta($cuenta->id);
                    }
                    
                    $this->view->showTabla($listaCuentas, $operacionesCuenta, $saldoCuentas);
                }else{
                    $this->view->showTabla("El cliente ingresado no tiene cuentas vinculadas");
                }
            }else{
                $this->view->showTabla("El cliente ingresado no existe");
            }
            
        }

        function saldoCuenta($id){
            $operacionesCuenta = $this->operacionesModel->getOperacionesCuenta($id);
            foreach ($operacionesCuenta as $operacion) {
                if($operacion->tipo_operacion = 1){
                    $saldo = $saldo - $operacion->monto;
                }elseif ($operacion->tipo_operacion = 2) {
                    $saldo = $saldo + $operacion->monto;
                }
            }
            return $saldo;
        }
    }  