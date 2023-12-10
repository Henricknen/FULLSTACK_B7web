<?php
class Cache {
     private $cache;        // variável privada que 'guardará' o cache

     public function setVar($nome, $valor) {        // função de 'atribiur' valor
        $this-> readCache();        // primeiro processo é ler o cache 'existente' e carregar os seus dados
        $this-> cache-> $nome = $valor;
        $this-> saveCache();        // salvar o cache atualizado
     }

     public function getVar($nome) {      // função de 'pegar' valor
        $this-> readCache();     // lendo o cache
        return $this-> cache-> $nome;
     }

     private function readCache() {    // função de 'leitura' do cache
        $this-> cache = new stdClass();      // limpando o cache ultilizando 'stdClass' que é um objeto vazio
        if(file_exists('cache.cache')) {
            $this-> cache = json_decode(file_get_contents('cache.cache'));    // 'file_get_contents' lê o conteudo de cache e transforma em 'string' e 'json_decode' converte a string em 'json' e atribui a propriedade 'cache'
        }
     }

     private function saveCache() {    // salva o cache quando fazer qualquer tipo de alteração
        file_put_contents("cache.cache", json_encode($this-> cache));
     }
}

$cache = new Cache();       // instançiando o 'objeto'
$cache-> setVar("nome", "Luis Henrique Silva Fereira");      // atribuindo 'set' meu nome a variável nome
$cache-> setVar("profissional", "TI");

echo "Meu nome é [". $cache-> getVar("nome"). "] e sou um profissional de [". $cache-> getVar("profissional"). "]";

?>