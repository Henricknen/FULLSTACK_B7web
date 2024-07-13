function removerElemento(el: HTMLElement | null): void {               // função 'removerElemento' recebe como parâmetro um elemento ou 'null' e não retorna nada 'void'
    if (!el) {
        return;         // se 'el' é null, sai da função para evitar erros
    }

    el.remove();        // remove o elemento do DOM

}


removerElemento(document.getElementById('teste'));

// -------------------------------------------------------------------------------

type QualquerFuncao = () => void;     // type 'QualquerFuncao' não reçebe nenhum parâmentro e utiliza 'void' não sendo necessario 'retornar' algo

const algo: QualquerFuncao = () => {
    return 12;
}

let retorno = algo();

