function alterarDados(id){
    let botao_alterar_dados_cliente = document.getElementById("alterar_dados_cliente");
    let botao_alterar_dados_estagiario = document.getElementById("alterar_dados_estagiario");
    let botao_alterar_dados_empresa = document.getElementById("alterar_dados_empresa");

    botao_alterar_dados_cliente.onclick = function (event) {
        event.preventDefault();
        alterarCliente();
    }
    
    /*botao_alterar_dados_estagiario.onclick = function (event) {
        event.preventDefault();
        alterarEstagiario();
    }
    
    botao_alterar_dados_empresa.onclick = function (event) {
        event.preventDefault();
        alterarEmpresa();
    }*/

    let tabela = document.getElementById("select").value
    if (tabela == "clientes") {
        uri = `/clientes/${id}`
        alterarCliente()
    } else if (tabela == "estagiarios") {
        uri = `/estagiarios/${id}`
    } else if (tabela == "empresas") {
        uri = `/empresas/${id}`
    }

    function alterarCliente() {
        let nome = document.getElementById("alterar_nome_cliente").value;
        let pedido = document.getElementById("alterar_pedido_cliente").value;
        console.log("Nome: ", nome);
        console.log("Pedido: ", pedido);
    
        let alterar_cliente = {
            nomeCliente: nome,
            pedidoCliente: pedido
        };

        console.log(alterar_cliente)
        fetch(uri, {
            method: "PUT",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(alterar_cliente)
        }).then((response) => {
            console.log('Resposta do servidor:', response);
            return response.text(); // Alterar para response.text() para ver o conteúdo
        }).then((texto) => {
            console.log("Dados recebidos: ", texto);
            try {
                const textoJson = JSON.parse(texto);
                console.log("JSON Parseado: ", textoJson);
                carregarClientes();
                alert("Registro alterado com sucesso!");
            } catch (error) {
                console.error("Erro ao analisar JSON: ", error.message);
                alert("Erro ao processar a resposta do servidor.");
            }
        }).catch((error) => {
            console.log("Erro: ", error.message);
        });
        
    }    
}