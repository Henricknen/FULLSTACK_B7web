<?php
interface Remuneravel {     // interfaçe 'Remuneravel' que irá definir um conjunto de métodos, com método 'remuneração'
    public function remuneracao();
}

class ContratoClt implements Remuneravel {     // classe de 'contratoClt' implementando interfaçe 'Remuneravel' que terá obrigatoriamente o método 'remuneração'
    public function remuneracao() {}

}

class Estagio implements Remuneravel { 
    public function remuneracao() {}

}

class ContratoPj implements Remuneravel {
    public function remuneracao() {}
}

class ContratoInternacional implements Remuneravel {
    public function remuneracao() {}
}

class FolhaDePagamento {        // classe 'FolhaDePagamento'
    public function calcular(Remuneravel $funcionario){        // nétodo 'calcular' implementa interfaçe 'Remuneravel'
        return $funcionario-> remuneracao();

    }
}