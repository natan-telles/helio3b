<?php
require_once "modelo/Banco.php";
require_once "modelo/Cliente.php";
$txtrecebido = file_get_contents("php://input");
$objJson = json_decode($txtrecebido) or die('{"mensagem" : "formato invalido"}');

$objResposta = new stdClass();
$objCliente = new Cliente();
$objCliente->setNomeCliente($objJson->novoCliente);
$objCliente->setPedidoCliente($objJson->pedidoCliente);

if ($objCliente->getNomeCliente() == "" || strlen($objCliente->getNomeCliente()) < 5 || $objCliente->getPedidoCliente() == "") {
    $objResposta->cod = 2;
    $objResposta->status = false;
    $objResposta->mensagem = "Por favor insira dados validos";
} elseif ($objCliente->isCliente() == true) {
    $objResposta->cod = 3;
    $objResposta->status = false;
    $objResposta->mensagem = "Cliente ja cadastrado";
} else {
    if ($objCliente->create() == true) {
        $objResposta->cod = 1;
        $objResposta->status = true;
        $objResposta->mensagem = "cadastrado com sucesso";
        $objResposta->novoCliente = $objCliente;
        $objResposta->id = $objCliente->getIdCliente();
    } else {
        $objResposta->cod = 2;
        $objResposta->status = false;
        $objResposta->mensagem = "Erro ao cadastrar cliente";
    }
}

header("Content-Type: application/json");
if ($objResposta->status == true) {
    header("HTTP/1.1 201");
} else {
    header("HTTP/1.1 200");
}

echo json_encode($objResposta);
