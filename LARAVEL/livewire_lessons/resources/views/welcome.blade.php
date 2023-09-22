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
    <h1>Página do Blade</h1>        {{-- Componente 'Blade' normal --}}
    <livewire:hello-word />
    <livewire:hello-word />
    @livewireScripts        {{-- Diretiva 'livewireScripts' inclui os scripts --}}
</body>
</html>
