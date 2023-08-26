<div class="inputArea">
    <label for="{{$name}}">
        {{$label ?? ''}}
    </label>
    <input
    type="checkbox"        {{-- se 'type' é fixo e definido como 'checkbox' --}}
    id="{{$name}}" name="{{$name}}"
    {{empty($required) ? '' : 'required'}}      {{-- verificando se 'required' está ou não está vazia --}}
    value="1"       {{--- se value não estiver como 'checked' não irá para o banco --}}
    {{$checked ? 'checked' : ''}}
    />
</div>