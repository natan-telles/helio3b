<?php
    require_once "modelo/Banco.php";
    require_once "modelo/Empresa.php";
    $objResposta = new stdClass();
    $objEmpresa = new Empresa();

    $dados = $objEmpresa->readAll();

    $objResposta->cod = 1;
    $objResposta->mensagem = "executado com sucesso";
    $objResposta->status = true;
    $objResposta->dados = $dados;

    header("Content-Type: application/json");
    header("HTTP/1.1 200");

    echo json_encode($objResposta);
