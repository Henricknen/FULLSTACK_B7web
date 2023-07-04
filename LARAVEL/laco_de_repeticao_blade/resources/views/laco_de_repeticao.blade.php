<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laço_de_repetição_Blade</title>
</head>
<body>
    
    @for($i = 0; $i <= 10 ;$i++)        {{-- laço de repetição 'for' no blade não se abre o bloco de chaves '{'  --}}
        <p>Apresento número <b>de 1 a 10 </b></p>
        <p>Número de valor: {{$i}}</p>
    @endfor

    <br><b>Ingredientes</b>
    @foreach ($ingredientes as $ing)        {{-- percorrendo o array '$ingredientes' e chamando cada item que encontrar de '$ing' --}}
        <p>{{$ing}}</p>
    @endforeach

</body>
</html>