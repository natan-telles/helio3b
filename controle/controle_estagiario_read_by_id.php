<?php
    require_once "modelo/Banco.php";
    require_once "modelo/Estagiario.php";

    $objResposta = new stdClass();
    $objEstagiario = new Estagiario();
    $objEstagiario->setIdEstagiario($id);
    
    $dados = $objEstagiario->readById();

    $objResposta->cod = 1;
    $objResposta->mensagem = "executado com sucesso";
    $objResposta->status = true;
    $objResposta->dados = $dados;
    
    header("Content-Type: application/json");
    header("HTTP/1.1 200");

    echo json_encode($objResposta);
