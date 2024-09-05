<?php
    require_once "modelo/Router.php";

    $roteador = new Router();

    //logar
    $roteador->post("/logar",function(){
        require_once "controle/controle_logar.php";
    });
    //cadastro
    $roteador->post("/cadastro",function(){
        require_once "controle/controle_cadastro.php";
    });

    // estagiario 
    $roteador->get("/estagiarios",function(){
        require_once("controle/controle_estagiario_read_all.php");
    }); 

    $roteador->get("/estagiarios/(\d+)",function($id){
        require_once("controle/controle_estagiario_read_by_id.php");
    }); 

    $roteador->post("/estagiarios",function(){
        require_once("controle/controle_estagiario_create.php");
    });
    
    $roteador->put("/estagiarios/(\d+)",function($id){
        require_once("controle/controle_estagiario_update.php");
    }); 

    $roteador->delete("/estagiarios/(\d+)",function($id){
        require_once("controle/controle_estagiario_delete.php");
    }); 


    // empresa
    $roteador->get("/empresas",function(){
        require_once("controle/controle_empresa_read_all.php");
    }); 

    $roteador->get("/empresas/(\d+)",function($id){
        require_once("controle/controle_empresa_read_by_id.php");
    }); 

    $roteador->post("/empresas",function(){
        require_once("controle/controle_empresa_create.php");
    });
    
    $roteador->put("/empresas/(\d+)",function($id){
        require_once("controle/controle_empresa_update.php");
    }); 

    $roteador->delete("/empresas/(\d+)",function($id){
        require_once("controle/controle_empresa_delete.php");
    }); 


    // cliente
    $roteador->get("/clientes",function(){
        require_once("controle/controle_cliente_read_all.php");
    }); 

    $roteador->get("/clientes/(\d+)",function($id){
        require_once("controle/controle_cliente_read_by_id.php");
    }); 

    $roteador->post("/clientes",function(){
        require_once("controle/controle_cliente_create.php");
    });
    
    $roteador->put("/clientes/(\d+)",function($id){
        require_once("controle/controle_cliente_update.php");
    }); 

    $roteador->delete("/clientes/(\d+)",function($id){
        require_once("controle/controle_cliente_delete.php");
    }); 

    $roteador->run();

?>