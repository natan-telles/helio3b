<?php
    require_once "modelo/Banco.php";
    require_once "modelo/Estagiario.php";
    $objResposta = new stdClass();
    $objEstagiario = new Estagiario();
    $objEstagiario->setIdEstagiario($id);
    if($objEstagiario->delete() == true){
        header("HTTP/1.1 204");
    }else{
        header("HTTP/1.1 200");
        header("Content-Type: application/json");
    }