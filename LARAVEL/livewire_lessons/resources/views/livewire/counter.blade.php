<div>
    <h1>Contador: {{$number}}</h1>
    <button wire:click = "increment($event.target.innerText)"> +1 </button>     {{-- 'event' captura o evento do botão 'target' é o elemento que dispara o evento 'innerText' pega o valor do botão --}}
    <button wire:click = "increment($event.target.innerText)"> +2 </button>
</div>
