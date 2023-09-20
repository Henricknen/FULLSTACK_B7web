<div style="border: 1px solid red; padding: 32px;">        {{-- primeiro elemento que é retornado pelo componente é chamado de 'pai' --}}
    <h1>Hello , {{$name}}</h1>
    <input type="text" wire:model = "name" />      {{-- wire:model faz 'conecao' com a propriedade $name e a passa para o input --}}
</div>
