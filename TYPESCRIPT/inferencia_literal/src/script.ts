function fazerRequisicao(url: string, method: 'GET' | 'POST') {     // funcão 'fazerRequisicao' reçebendo como parâmetro 'url' é uma string e 'method' que reçebe 'types literais'
    // ...
}

type RequestDetails = {     // type 'espeçifico' para detalhes de requisição que contém
    url: string,        // uma url 'string'
    method: 'GET' | 'POST'      // method que é 'get' ou 'post'
};

let req: RequestDetails = {     // utilizando o type espeçifico neste objeto
    url: 'https://www.google.com.br',
    method: 'GET'
};

fazerRequisicao(req.url, req.method);