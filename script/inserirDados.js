
// <<<<<<< esta funcao deve receber um array, para inserir cada dado do array como uma div nova na tela inicial >>>>>>>>>

function inserirDados(dados) {
    // Obtém o elemento onde os dados serão inseridos
    let divResposta = document.getElementById("resposta");

    // Limpa a div antes de adicionar novos dados
    divResposta.innerHTML = '';

    // Verifica se 'dados' é um array
    if (Array.isArray(dados)) {
        dados.forEach((dado, index) => {
            let divItem = document.createElement("div");
            divItem.setAttribute("id", index);
            divItem.textContent = JSON.stringify(dado);
            divItem.setAttribute("data-json", JSON.stringify(dado));

            // Criar e inserir botões para cada item
            let botoes = criarBotoes();
            divItem.appendChild(botoes);
            divResposta.appendChild(divItem);
        });
    } else {
        console.log("Erro: 'dados' não é um array.");
    }
}