<?php       // arquivos php devem usar única e exclusivamente tag '<?php' não sendo neçessario fechar'

function algumafuncao() {        // símbolo 'função'

}

$nome = "Luis Henrique Silva Ferreira";     // símbolo 'variável'
echo "Meu nome é: ". $nome;     // 'implimir na tela' efeito colateral

require 'classe.php';       // não é recomendado fazer o import direto do arquivo da classe
$classe = new Classe();         // para depois utilizar

class CarroDeBriquedo {     // nomes de classes devem sempre ultilizar o 'StudlyCaps' sendo as primeiras letras de cada palavra letras maíscula


    const VERSION = 1.0;        // constantes devem sempre ser em 'MAÍSCULAS'

    const DATA_DE_CRIACAO = 28/01/2024;     // ou ultilizar 'UNDERLINE'

    public function getNome() {      // métodos devem ultilizar o padrão 'cameCase'

    }

}

// 1. Arquivos devem sempre ultilizar apenas o <?php
// 2. Sempre salvar arquivos PHP em UTF-8 sem BOM
// 3. Arquivos devem declarar símbolos (classe, fuctions, constantes, etc... ou gerar 'html, css') ou efeitos colaterais (escrever algo na tela, dar um output)
// 4. Classes devem sempre usar um sistema de autoload (PSR 0, PSR 4)
// 5. Nomes de classes devem sempre ultilizar StudlyCaps
// 6. Costantes devem sempre ser 'MAISCULAS' ou com 'UNDERLINE'
// 7. Nomes de métodos de classes devem seguir o padrão camelCase sendo a primeira letra 'minuscula' e a da outra palavra seguinte 'maíscula'