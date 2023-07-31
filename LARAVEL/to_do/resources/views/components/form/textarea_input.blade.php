<div class="inputArea">
    <label for="{{$name}}">
        {{$label ?? ''}}
    </label>
    <textarea
        name="{{$name}}"
        placeholder="{{empty($placeholder) ? '' : $placeholder}}"
        {{empty($required) ? '' : 'required'}}>{{$value ?? ''}}</textarea>
</div>
