function carregarClientes() {
    const uri = "/clientes"
    fetch(uri, {
        method: "GET",
        headers: {
            'Content-Type': 'application/json'
        }
    }).then((response) => {
        return response.json()
    }).then((textoJson) => {
        //console.log(textoJson.dados) //dados retornados da API
        inserirDados(textoJson.dados)
    }).catch((error) => {
        console.log("Erro: ", error)
    })
}

function carregarEmpresas() {
    const uri = "/empresas"
    fetch(uri, {
        method: "GET",
        headers: {
            'Content-Type': 'application/json'
        }
    }).then((response) => {
        return response.json()
    }).then((textoJson) => {
        //console.log(textoJson.dados) //dados retornados da API
        inserirDados(textoJson.dados)
    }).catch((error) => {
        console.log("Erro: ", error)
    })
}

function carregarEstagiarios() {
    const uri = "/estagiarios"
    fetch(uri, {
        method: "GET",
        headers: {
            'Content-Type': 'application/json'
        }
    }).then((response) => {
        return response.json()
    }).then((textoJson) => {
        //console.log(textoJson.dados) //dados retornados da API
        inserirDados(textoJson.dados)
    }).catch((error) => {
        console.log("Erro: ", error)
    })
}