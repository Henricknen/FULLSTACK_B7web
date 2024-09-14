<?php 

$idade = 18;
$acompanhadoResposavel = false;

if($idade >= 18 || $acompanhadoResposavel == true) {        // se '$idade' for maior ou igual a 18 ou '$acompanhadoResposavel' for true ou seja estiver presente
    echo 'Voçê pode entrar na festa';
} else {
    echo 'Voçê não pode entrar na festa';
}