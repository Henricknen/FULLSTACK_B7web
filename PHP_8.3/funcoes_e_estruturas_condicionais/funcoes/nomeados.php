<?php

function parametros_nomeados(string $nome, string $sobrenome, int $idade): string {
    return "Meu nome é $nome $sobrenome e tenho $idade";
}

echo parametros_nomeados(nome: 'Luis Henrique', sobrenome: 'Silva Ferreira', idade: 33);        // passando as vareáveis 'nomeadas'
