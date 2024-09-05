<?php
    require_once "modelo/Banco.php";
    require_once "modelo/Empresa.php";
    $objResposta = new stdClass();
    $objEmpresa = new Empresa();
    $objEmpresa->setIdEmpresa($id);
    if($objEmpresa->delete() == true){
        header("HTTP/1.1 204");
    }else{
        header("HTTP/1.1 200");
        header("Content-Type: application/json");
    }