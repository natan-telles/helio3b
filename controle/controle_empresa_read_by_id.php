<?php
use Firebase\JWT\MeuTokenJWT;
require_once "modelo/MeuTokenJWT.php";
require_once "modelo/Banco.php";
require_once "modelo/Empresa.php";

$objResposta = new stdClass();
$objEmpresa = new Empresa();
$objEmpresa->setIdEmpresa($id);

$headers = getallheaders();
$authorization = $headers['Authorization'];
$token = new MeuTokenJWT();
if ($token->validarToken($authorization)) {
    $dados = $objEmpresa->readById();
    $objResposta->cod = 1;
    $objResposta->mensagem = "executado com sucesso";
    $objResposta->status = true;
    $objResposta->dados = $dados;
}else{
    $objResposta->cod = 2;
    $objResposta->status = false;
    $objResposta->mensagem = "Token invalido!";
    $objResposta->tokenRecebido = $authorization;
}

header("Content-Type: application/json");
header("HTTP/1.1 200");

echo json_encode($objResposta);
