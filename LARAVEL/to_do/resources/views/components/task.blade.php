<div class="task">
    <div class="title">
        <input type="checkbox"
        @if (isset($data) && $data['is_done'])     {{-- criando verificando se as tasks está marcadas, se 'done' for 'true' está se 'false' não está --}}
            checked
        @endif
        />
         
        <div class="task_title"> {{$data['title'] ?? ''}} </div>        {{-- se não existir título ficará em branco '' --}}
    </div>
    <div class="priority">
        <div class="sphere"></div>
        <div> {{$data['category']-> title ?? ''}} </div>        {{-- pegará somente o título da categoria --}}
    </div>
    <div class="actions">
        <a href= "{{route('task.edit', ['id' => $data['id']])}}">
            <img src="/assets/images/icon-edit.png">
        </a>
        <a href= "{{route('task.delete', ['id' => $data['id']])}}">
            <img src="/assets/images/icon-delete.png">
        </a>
    </div>
</div>