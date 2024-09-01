<?php 

$formacao = [         // array principal com minhas formações
    $pos = [
        "pós: Desenvolvimento Web" => 1,     // definindo a quantidade 'valor' de determinada formação
    ],
    $graduacao = [
        "graduação: Análise e desenvolvimento de sistemas" => 1,
    ],
    $tecnicos = [       // inserindo um array dentro do outro
        "Técnico: Informática para internet" => 1,
        "Técnico: Eletroeletrônica" => 2,
    ],
    $cursos = [
        "curso: Front End" => 1,
        "curso: Lógica de programação" => 2
    ]
];




echo $pos["pós: Desenvolvimento Web"];      // será impresso a quantidade 'valor' da determinada formação
echo "<br>";
echo "<pre>";       // 'pre' permite a impressão do array pré formatado, melhorando a visíbilidade do mesmo
var_dump($formacao);        // 'var_dump' imprimira os 'indiçes' e os 'valores'
echo "</pre>";

?>