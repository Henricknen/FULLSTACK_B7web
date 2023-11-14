<?php

require 'historico.class.php';
$log = new Historico();     // intançiando classe 'Historico'
$log-> registrar("Entrou na página iniçial....");       //  registra uma ação chamando o método 'registrar' da instância da classe