<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Primeiro projeto livewire</title>
    @livewireStyles     {{-- diretiva 'livewireStyles' inclui todos os estilos do livewire --}}
</head>
<body>
    <h1>Página do blade</h1>        {{-- componente 'blade' normal --}}
    <livewire:hello-word />     {{-- renderizando componete livewire 'hello-word' --}}
    @livewireScripts        {{-- diretiva 'livewireScripts' inclui os scripts --}}
</body>
</html>