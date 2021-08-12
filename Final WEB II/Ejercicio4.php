<?php

//Ejercicio4 
//a) Para integrar una API al sistema se va a necesitar un Router propio de la API, un Controller que va a
// estar conectado con los mismos Models del sistema y luego una view para la API.

//b) $route->addRoute("listaResenas/:ID", "GET", "APIController", "getListaResenas");
// $route->addRoute("editarResena:ID", "PUT", "APIController", "updateResena");
//$route->addRoute("agregarResena", "POST", "APIController", "addResena");
// $route->addRoute("eliminarResena:ID", "DELETE", "APIController", "deleteResena");

//c)

class Controller{

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

    function getListaResenas($params = null){
        $idEmpresa = $params[':ID'];
        $resenas = $this->valoracioModel->getResenasEmpresa($idEmpresa);
        if(!empty($resenas)){
            $this->view->response($resenas, 200);
        }else{
            $this->view->response("La empresa no tiene reseñas aun", 404);
        }
    }

    function updateResena($params = null){
        $idResena = $params[':ID'];
        $body = getData();
        $this->valoracionModel->updateResena($body->id_empresa, $body->id_usuario, $body->valoracion, $body->resena, $body->inadecuada);
    }
}