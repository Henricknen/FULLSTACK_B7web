<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Componentes</title>
</head>
<body>
    
    <br><b>Ingredientes</b>
    @foreach ($ingredientes as $ing)        {{-- percorrendo o array '$ingredientes' e chamando cada item que encontrar de '$ing' --}}
        <p>
            {{$ing}} -  
            @component('components.botao')      {{-- diretiva '@component' com o endereço 'components.botao' importa o componente para dentro do código --}}
                @slot('href')
                    http://google.com.br
                @endslot
                @slot('cor')        {{-- passando 'slot' cor para este componente --}}
                    blue
                @endslot
                Editar
            @endcomponent

            @component('components.botao')
                @slot('href')
                    https://github.com/
                @endslot
                @slot('cor')
                    red
                @endslot
            Deletar
            @endcomponent
        </p>
    @endforeach

</body>
</html>