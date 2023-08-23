<div class="inputArea">
    <label for="{{$name}}">
        {{$label ?? ''}}
    </label>
    <select id="{{$name}}" name="{{$name}}" {{empty($required) ? '' : 'required'}}>       <!-- 'select' category é 'required' obrigatorio seu preenchimento -->
        <option selected disabled value="">Seleçione uma opção</option>
        {{$slot}}
    </select>
</div>