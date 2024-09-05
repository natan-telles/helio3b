<?php
    require_once "modelo/Banco.php";
    require_once "modelo/Cliente.php";
    $objResposta = new stdClass();
    $objCliente = new Cliente();
    $objCliente->setIdCliente($id);
    if($objCliente->delete() == true){
        header("HTTP/1.1 204");
    }else{
        header("HTTP/1.1 200");
        header("Content-Type: application/json");
    }