<?php
require_once "modelo/Banco.php";
require_once "modelo/Empresa.php";
$txtrecebido = file_get_contents("php://input");
$objJson = json_decode($txtrecebido) or die('{"mensagem" : "formato invalido"}');

$objResposta = new stdClass();
$objEmpresa = new Empresa();
$objEmpresa->setNomeEmpresa($objJson->novaEmpresa);
$objEmpresa->setCnpj($objJson->cnpjEmpresa);
$objEmpresa->setIdClienteEmpresa($objJson->idClienteEmpresa);

if ($objEmpresa->getNomeEmpresa() == "" || strlen($objEmpresa->getNomeEmpresa()) < 3 || 
    $objEmpresa->getCnpj() == "" || $objEmpresa->getIdClienteEmpresa() == "" || strlen($objEmpresa->getCnpj()<18)) {
    $objResposta->cod = 2;
    $objResposta->status = false;
    $objResposta->mensagem = "Por favor insira dados validos";
} elseif ($objEmpresa->isEmpresa() == true) {
    $objResposta->cod = 3;
    $objResposta->status = false;
    $objResposta->mensagem = "Empresa ja cadastrada";
} else {
    if ($objEmpresa->create() == true) {
        $objResposta->cod = 1;
        $objResposta->status = true;
        $objResposta->mensagem = "cadastrado com sucesso";
        $objResposta->novaEmpresa = $objEmpresa;
    } else {
        $objResposta->cod = 2;
        $objResposta->status = false;
        $objResposta->mensagem = "Erro ao cadastrar empresa";
    }
}

header("Content-Type: application/json");
if ($objResposta->status == true) {
    header("HTTP/1.1 201");
} else {
    header("HTTP/1.1 200");
}

echo json_encode($objResposta);