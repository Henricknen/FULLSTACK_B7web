import './style.css';       // 'importando' arquivo css

class Botao {

    constructor() {
        this.title = '';        // define o titulo como vazio
        this.callback = function() {     // função vazia

        };
    }

    setTitle(t) {
        this. title = t;
    }

    setClick(f) {        // 'setClick' cria uma ação para o botão
        this. callback = f;
    }

    render() {      // 'render' função que criará o icone
        
        let b = document.createElement('button');
        b.classList.add('botao');
        b.innerHTML = this.title;
        b.addEventListener('click', this.callback);
        
        return b;
        
    }
}

export default Botao;       // exportando 'classe Botao'