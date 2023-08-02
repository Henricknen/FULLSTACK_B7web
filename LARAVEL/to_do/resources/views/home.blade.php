<x-layout page="To_do_App_Inicio">      {{-- tudo o que for comum entre as páginas será renderizado pelo componente 'layout' --}}

    <x-slot:btn>
        <a href="{{route('task.create')}}" class="btn btn-primary">
            Criar Tarefa
        </a>
    </x-slot:btn>

    <section class="graph">
        <div class="graph_header">
            <h2>Progresso do dia - </h2>
            <div class="graph_header-line"></div>
            <div class="graph_header-date">

                <img src="/assets/images/icon-prev.png">
                    7/06
                <img src="/assets/images/icon-next.png">
            
            </div>
        </div>

        <div class="graph_header-subtitle">Tarefas: <b>3 / 6</b>
        
        </div>

        <div class="graph-placeholder">

        </div>

        <div class="tasks_left_footer">
            <img src="/assets/images/icon-info.png">
            Resta apenas 3 tarefas para serem realizadas
        </div>
        
    </section>

    <section class="list">
        <div class="list_header">
            <select class="list_header-select">
                <option value="1">Todas as tarefas</option>
            </select>
        </div>
        <div class="task_list">
            
            @foreach ($tasks as $task)      {{-- loop 'foreach' irá gerar as tasks --}}
                <x-task :data="$task" />        {{-- redenrizando 'task' que é a variável do foreach --}}
            @endforeach

        </div>
    </section>
</x-layout>