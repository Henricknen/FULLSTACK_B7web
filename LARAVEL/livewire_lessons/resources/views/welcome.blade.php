<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Primeiro projeto Livewire</title>
    @livewireStyles      {{-- Diretiva 'livewireStyles' inclui todos os estilos do Livewire --}}
</head>
<body>
    
    <livewire:counter />        {{-- chamando componente 'counter' --}}
    <livewire:user user = "Luis Henrique S F" />        {{-- populando a chamada com dados --}}

    @livewireScripts        {{-- Diretiva 'livewireScripts' inclui os scripts --}}
</body>
</html>
