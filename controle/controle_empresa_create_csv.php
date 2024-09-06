<?php
require_once __DIR__ . '/../modelo/Empresa.php';

$nomeArquivo = $_FILES['csv']['tmp_name'];
$ponteiroArquivo = fopen($nomeArquivo, "r");
$empresas = array();
$i = 0;
while (($linhaArguivo = fgetcsv($ponteiroArquivo, 1000, ";")) !== false) {
    $linhaArguivo = array_map("utf8_encode", $linhaArguivo);

    $empresas[$i] = new Empresa();
    $empresas[$i]->setNomeEmpresa($linhaArguivo[0]);
    $empresas[$i]->setCnpj($linhaArguivo[1]);
    $empresas[$i]->setIdClienteEmpresa($linhaArguivo[2]);

    if ($empresas[$i]->create()) {
        $i++;
    }
}
$resposta = new stdClass();
$resposta->status = true;
$resposta->msg = "Empresas cadastradas com sucesso";
$resposta->cadastrados = $empresas;
$resposta->totalEmpresas = $i;
echo json_encode($resposta);
