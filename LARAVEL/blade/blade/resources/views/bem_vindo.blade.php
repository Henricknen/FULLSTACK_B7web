<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blade</title>
</head>
<body>
    <h1>Seja bem vindo ao meu Repositorio de {{$codificando_framework}}</h1>       <!-- para que o 'blade' entenda que '$codificando_framework' é uma variável que vem do controller é necessario colocar entre chaves { duplas -->
    <h2>Codificado no ano de {{$ano}}</h2>
    <h3>46 + 54 é: {{46 + 54}}</h3>        <!-- não é necessario ser apenas variáveis para ser executada a lógica dentro das chaves '{' -->
    <p>Código HTML: {{$html}}</p>       <!-- mostra toda a 'string' -->
    <p>Código HTML Interpretado: {!!$html!!}</p>        <!-- '{!'!}' faz o código 'html' ser interpretado na 'view' -->
    <h4>função é: {{-- funcao() --}} </h4>       <!-- imprime funções desde que a função retorne uma 'string' ou um 'número', {{-- --}} faz comentários dentro do blade -->
</body>
</html>