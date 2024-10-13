<?php

session_start();        // 'session_start' abre uma seção se ela não existir e se existir irá ler a seção

$_SESSION['teste'] = 123;       // variável global '$_SESSION' define o conteúdo da seção
$_SESSION['nome'] = 'Luis Henrique Silva Ferreira';
$_SESSION['profissional'] = 'Front End';