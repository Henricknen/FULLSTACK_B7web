<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Condiçionais</title>
</head>
<body>
    <h1>Seja bem vindo ao meu Repositorio de {{$codificando_framework}}</h1>       <!-- para que o 'blade' entenda que '$codificando_framework' é uma variável que vem do controller é necessario colocar entre chaves { duplas -->
    <h2>Codificado no ano de {{$ano}}</h2>

    <h1>{{$codificando_framework == 'Laravel' ? 'Sim' : 'Nâo'}}</h1>        <!-- '  condiçional dentro do 'blade' ultilizando operador ternário '? 'Sim':'Não' ' -->

    <span>Estou codificando Framework !</span>
    @if($codificando_framework == 'Laravel')        <!-- condição ultilizando diretiva 'if' ao invés do blade '{' -->
        <h1>Laravel</h1>
    @elseif($codificando_framework == "Angular")
        <h1>Angular</h1>
    @else
        <h2>Nenhum dos dois...</h2>
    @endif

</body>
</html>