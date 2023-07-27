<div class="task">
    <div class="title">
        <input type="checkbox"
        @if (isset($data) && $data['done'])     {{-- criando verificando se as tasks está marcadas, se 'done' for 'true' está se 'false' não está --}}
            checked
        @endif
        />
         
        <div class="task_title"> {{$data['title'] ?? ''}} </div>        {{-- se não existir título ficará em branco '' --}}
    </div>
    <div class="priority">
        <div class="sphere"> {{$data['category'] ?? ''}} </div>
    </div>
    <div class="actions">
        <a href="http://meusite.com/task/edit/{{ $data['id'] ?? '' }}">

            <img src="/assets/images/icon-edit.png">
        </a>
        <a href="http://meusite.com/task/delete/{{ $data['id'] ?? '' }}">
            <img src="/assets/images/icon-delete.png">
        </a>
    </div>
</div>