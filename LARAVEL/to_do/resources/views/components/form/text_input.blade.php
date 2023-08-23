<div class="inputArea">     {{-- todo imput de texto será usado este componente --}}
    <label for="{{$name}}">
        {{$label ?? ''}}
    </label>
    <input
    type="{{empty($type) ? 'text' : $type}}"        {{-- se 'type' não for definido será do tipo 'text' --}}
    id="{{$name}}" placeholder="{{$placeholder ?? ''}}"
    {{empty($required) ? '' : 'required'}}      {{-- verificando se 'required' está ou não está vazia --}}
    />
</div>