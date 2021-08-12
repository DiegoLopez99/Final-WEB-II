<?php

    class Controller{

        private $view;
        private $clienteModel;
        private $cuentaModel;
        private $operacionModel;

        function __construc(){
            $this->view = new View();
            $this->clienteModel = new clienteModel;
            $this->cuentaModel = new cuentaModel;
            $this->opercionModel = new opercionModel;
        }

        function transferenciaRapida(){
            $idClienteOrigen = $_POST['id'];
            $idCuenta = $_POST['idCuenta'];
            $DNIclienteDestino = $_POST['dni'];
            $monto = $_POST['monto'];
            if(isset($idClienteOrigen) && isset($DNIclienteDestino) && isset($monto)){
                $this->chekLogin($idClienteOrigen);
                $saldoCuenta = $this->saldoCuenta($idCuenta);
                if($saldoCuenta >= $monto){
                    $clienteDestino = $this->clienteModel->getCliente($DNIclienteDestino);
                    if(isset($clienteDestino)){
                        $cuentaDestino = $this->cuentaModel->getCuenta($clienteDestino->id);
                        $this->operacionModel->transferencia($idCuenta, $cuentaDestino->id, $monto);
                        $this->view->showTransf('Transferencia exitosa');
                    }else{
                        $this->view->showTransf('El cliente con el dni ingresado no existe');
                    }
                }else{
                    $this->view->showTransf('La cuenta no tiene suficiente saldo para realizar la transferencia');
                }
            }else{
                $this->view->showTransf('Ingrese correctamente todos los campos');
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