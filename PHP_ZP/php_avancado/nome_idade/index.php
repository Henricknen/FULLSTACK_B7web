<?php
require 'Pessoa.class.php';

$pessoa = new Pessoa('Luis Henrique S Ferreira', '08/05/1991');

echo $pessoa-> getNome()." tem ".$pessoa-> getIdade(). " anos";