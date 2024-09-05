function excluirRegistro(divItem, id) {
    divResposta.removeChild(divItem);
    console.log("Item excluído")

    let tabela = document.getElementById("select").value
    if (tabela == "clientes") {
        uri = `/clientes/${id}`
    } else if (tabela == "estagiarios") {
        uri = `/estagiarios/${id}`
    } else if (tabela == "empresas") {
        uri = `/empresas/${id}`
    }

    //console.log(id)
    fetch(uri, {
        method: "DELETE",
        headers: {
            'Content-Type': 'application/json'
        }
    }).then((response) => {
        //return response.json()
        alert("Excluido com sucesso")
    }).then((textoJson) => {
        //console.log(textoJson.dados)
    }).catch((error) => {
        console.log("Erro: ", error)
    })
}