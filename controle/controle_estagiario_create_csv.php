<?php
require_once __DIR__ . '/../modelo/Estagiario.php';

$nomeArquivo = $_FILES['csv']['tmp_name'];
$ponteiroArquivo = fopen($nomeArquivo, "r");
$estagiarios = array();
$i = 0;
while (($linhaArguivo = fgetcsv($ponteiroArquivo, 1000, ";")) !== false) {
    $linhaArguivo = array_map("utf8_encode", $linhaArguivo);

    $estagiarios[$i] = new Estagiario();
    $estagiarios[$i]->setNomeEstagiario($linhaArguivo[0]);
    $estagiarios[$i]->setDataNascimento($linhaArguivo[1]);
    $estagiarios[$i]->setTelefone($linhaArguivo[2]);
    $estagiarios[$i]->setEmail($linhaArguivo[3]);
    $estagiarios[$i]->setIdEmpresa($linhaArguivo[4]);

    if ($estagiarios[$i]->create()) {
        $i++;
    }
}
$resposta = new stdClass();
$resposta->status = true;
$resposta->msg = "Estagiarios cadastradas com sucesso";
$resposta->cadastrados = $estagiarios;
$resposta->totalEstagiarios = $i;
echo json_encode($resposta);