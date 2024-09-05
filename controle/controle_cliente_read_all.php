<?php
    require_once "modelo/Banco.php";
    require_once "modelo/Cliente.php";
    $objResposta = new stdClass();
    $objCliente = new Cliente();

    $dados = $objCliente->readAll();

    $objResposta->cod = 1;
    $objResposta->mensagem = "executado com sucesso";
    $objResposta->status = true;
    $objResposta->dados = $dados;

    header("Content-Type: application/json");
    header("HTTP/1.1 200");

    echo json_encode($objResposta);
