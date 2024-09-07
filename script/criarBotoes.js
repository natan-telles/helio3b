function criarBotoes() {
    //botao excluir
    let excluir = document.createElement("button")
    excluir.textContent = "Excluir"
    excluir.className = "excluir"

    //funcao excluir do botao
    excluir.onclick = function () {
        let confirmacao = confirm("Deseja realmente excluir?")
        if (confirmacao) {
            let divItem = excluir.parentNode.parentNode.textContent;
            let objJson = divItem.slice(divItem.indexOf("{"), divItem.indexOf("}") + 1)
            //console.log(objJson)
            objJson = JSON.parse(objJson)

            let id
            if (tabelaAtual == "clientes") {
                id = objJson.id_cliente
            } else if (tabelaAtual == "estagiarios") {
                id = objJson.id_estagiario
            } else if (tabelaAtual == "empresas") {
                id = objJson.id_empresa
            }
            let div = excluir.parentElement.parentElement
            excluirRegistro(div, id)
            //console.log(id)
            //console.log(true)
        } else {
            //console.log(false)
        }
    }

    
    

    //botao alterar
    let alterar = document.createElement("button")
    alterar.textContent = "Alterar"
    alterar.id = "alterar"
    alterar.className = "alterar"

    alterar.onclick = function () {
        let divItem = alterar.parentNode.parentNode.textContent;
        let objJson = divItem.slice(divItem.indexOf("{"), divItem.indexOf("}") + 1)
        console.log(objJson)
        objJson = JSON.parse(objJson)

        let id
        if (tabelaAtual == "clientes") {
            id = objJson.id_cliente
            let tela = document.getElementById('alterar_cliente')
            tela.style.display = "block"
        } else if (tabelaAtual == "estagiarios") {
            id = objJson.id_estagiario
            let tela = document.getElementById('alterar_estagiario')
            tela.style.display = "block"
        } else if (tabelaAtual == "empresas") {
            id = objJson.id_empresa
            let tela = document.getElementById('alterar_empresa')
            tela.style.display = "block"
        }
        

        let botao_alterar_dados_cliente = document.getElementById("alterar_dados_cliente");
        botao_alterar_dados_cliente.onclick = function (event){
            event.preventDefault();        
            alterarRegistro(id);
        }

        let botao_alterar_dados_empresa = document.getElementById("alterar_dados_empresa");
        botao_alterar_dados_empresa.onclick = function (event){
            event.preventDefault();        
            alterarRegistro(id);
        }

        let botao_alterar_dados_estagiario = document.getElementById("alterar_dados_estagiario");
        botao_alterar_dados_estagiario.onclick = function (event){
            event.preventDefault();        
            alterarRegistro(id);
        }
    }

    

    let botao_close_alterar_cliente = document.getElementById("close_alterar_cliente");
    botao_close_alterar_cliente.onclick = function (event){
        event.preventDefault();
        let tela = document.getElementById('alterar_cliente')
        tela.style.display = "none"
    }

    let botao_close_alterar_empresa = document.getElementById("close_alterar_empresa");
    botao_close_alterar_empresa.onclick = function (event){
        event.preventDefault();
        let tela = document.getElementById('alterar_empresa')
        tela.style.display = "none"
    }

    let botao_close_alterar_estagiario = document.getElementById("close_alterar_estagiario");
    botao_close_alterar_estagiario.onclick = function (event){
        event.preventDefault();
        let tela = document.getElementById('alterar_estagiario')
        tela.style.display = "none"
    }

    //span para os botoes
    let span = document.createElement("span")
    span.className = "botoes"
    span.appendChild(alterar)
    span.appendChild(excluir)

    return span
}