function inserirDados(dados) {
    // Obtém o elemento onde a tabela será inserida
    let divResposta = document.getElementById("resposta");

    // Limpa a div antes de adicionar novos dados
    divResposta.innerHTML = '';

    // Verifica se 'dados' é um array
    if (Array.isArray(dados) && dados.length > 0) {
        // Cria a tabela e o corpo da tabela
        let tabela = document.createElement("table");
        let thead = document.createElement("thead");
        let tbody = document.createElement("tbody");

        // Cria o cabeçalho da tabela
        let trHead = document.createElement("tr");
        Object.keys(dados[0]).forEach(key => {
            let th = document.createElement("th");
            th.textContent = key;
            trHead.appendChild(th);
        });

        // Adiciona uma coluna extra para os botões
        let thActions = document.createElement("th");
        thActions.textContent = "Ações";
        trHead.appendChild(thActions);

        thead.appendChild(trHead);

        // Adiciona o cabeçalho à tabela
        tabela.appendChild(thead);

        // Adiciona as linhas da tabela
        dados.forEach((dado, index) => {
            let tr = document.createElement("tr");

            // Adiciona células com dados e o atributo data-json
            Object.entries(dado).forEach(([key, value], cellIndex) => {
                let td = document.createElement("td");
                td.textContent = value;

                // Adiciona o atributo data-json apenas à primeira célula
                if (cellIndex === 0) {
                    td.setAttribute("data-json", JSON.stringify(dado));
                }

                tr.appendChild(td);
            });

            // Cria e adiciona botões à linha
            let tdActions = document.createElement("td");
            let botoes = criarBotoes(); // Passa o índice para criarBotoes
            tdActions.appendChild(botoes);
            tr.appendChild(tdActions);

            tbody.appendChild(tr);
        });

        // Adiciona o corpo da tabela à tabela
        tabela.appendChild(tbody);

        // Adiciona a tabela ao elemento divResposta
        divResposta.appendChild(tabela);
    } else {
        console.log("Erro: 'dados' não é um array ou está vazio.");
    }
}
