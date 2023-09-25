<div>
    <br>
    <input wire:model = "name" />
    <h1>Name: {{$name}}</h1>
    <input wire:model = "namesurname" />
    <h1>Sobrenome:: {{$surname}}</h1>

    <h1 style="color:red;">Hook: {{$hookName}}</h1>
    {{-- <h1 style="color:blue;">PropertyName: {{$propertyName}}</h1>
    <h1 style="color:green;">PropertyValue: {{$propertyValue}}</h1> --}}
</div>
