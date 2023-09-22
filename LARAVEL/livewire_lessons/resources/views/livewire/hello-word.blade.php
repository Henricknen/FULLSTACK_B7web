<div style="border: 1px solid red; padding: 32px;">    {{-- primeiro elemento que é retornado pelo componente é chamado de 'pai' --}}
    <h1>Hello, {{$name}}</h1>
    <input wire:model="name" type="text" />      {{-- wire:model faz 'conexão' com a propriedade $name e a passa para o input --}}
</div>
