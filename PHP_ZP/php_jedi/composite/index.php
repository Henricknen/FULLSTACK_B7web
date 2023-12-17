<?php
require 'classes.php';

$form = new Form();     // criação do objeto 'Form'
$form-> addElement(new Label('Usuario:'));
$form-> addElement(new inputText('usuario:'));      // 'adiçionando' elementos

$form-> addElement(new Label('Senha:'));
$form-> addElement(new inputText('senha', 'password'));

$form-> addElement(new SubmitButton('Enviar'));

echo $form-> render();       // redenriza