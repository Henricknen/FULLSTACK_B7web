<div>
    <h1>Contador (0-50): {{$number}}</h1>

    <input wire:keydown.a.prevent = "increment" wire:keydown.d.prevent = "decrement" />      {{-- 'keydown' dipara quando a tecla mençionda depois do '.' for digitada no input, 'prevent' é um modificador que não mostra a tecla que foi mençionada depois do . na tela do input --}}

    <button wire:mouseover = "increment">mouseover</button>     {{-- 'mouseover' dispara quando o cursor do mause passa em cima do botão --}}
    <button wire:mouseout = "decrement">mouseout</button>           {{-- 'mouseout' dispara quando o cursor do mause sai de cima do botão --}}

    <button wire:mouseover = "$set('number', 10)">Setar 10</button>     {{-- ultilizando 'magic actions $set' para mudar a propriedade number sem preçisar de método que edite a propriedade --}}
    <button wire:mouseover = "$toggle('number')">Toggle</button>            {{-- magic actions 'toggle' alternar de true para false --}}
</div>
