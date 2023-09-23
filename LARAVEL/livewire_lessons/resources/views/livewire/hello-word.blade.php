<div style="border: 1px solid red; padding: 32px; background-color: {{$color}}">    {{-- primeiro elemento que é retornado pelo componente é chamado de 'pai' --}}
    <h1>{{$salutation}}, {{strtoupper($name)}}</h1>       {{-- 'strtoupper' transforma as letras em maiúculas --}}
    <select wire:model = "salutation">
        @foreach($salutationOptions as $option)
            <option value="{{$option}}">{{$option}}</option>
        @endforeach
    </select>
    <input type = "color" wire:model = "color">
</div>
