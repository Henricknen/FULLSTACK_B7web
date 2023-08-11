<x-layout page="To_do_App_Inicio">
    {{-- tudo o que for comum entre as páginas será renderizado pelo componente 'layout' --}}

    <x-slot name="btn">
        {{-- <a href="{{ route('task.create') }}" class="btn btn-primary"> --}}
        <a href="#" class="btn btn-primary">
            Criar Tarefa
        </a>
        {{-- <a href="{{ route('logout') }}" class="btn btn-primary"> --}}
        <a href="#" class="btn btn-primary">
            Sair
        </a>
    </x-slot>

    <main>
        {{-- conteúdo principal --}}
        <section class="graph">
            <div class="graph_header">
                <h2>Progresso do dia</h2>
                <div class="graph_header-line"></div>
                <div class="graph_header-date">
                    <img src="/assets/images/icon-prev.png" alt="Previous Icon">
                    7/06
                    <img src="/assets/images/icon-next.png" alt="Next Icon">
                </div>
            </div>

            <div class="graph_header-subtitle">Tarefas: <b>3 / 6</b></div>

            <div class="graph-placeholder"></div>

            <div class="tasks_left_footer">
                <img src="/assets/images/icon-info.png" alt="Info Icon">
                Restam apenas 3 tarefas para serem realizadas
            </div>
        </section>

        <section class="list">
            <div class="list_header">
                <select class="list_header-select">
                    <option value="1">Todas as tarefas</option>
                </select>
            </div>
            <div class="task_list">
                @php
                    $tasks = [
                        ['done' => false, 'title' => 'primeira task', 'category' => 'categoria 1'],
                        [
                        'id'=> 3,
                        'done' => true,
                        'title' => 'segunda task',
                        'category' => 'categoria 2',
                        'delete_url'=> '#',
                        'edit_url'=> '#']
                        ,
                    ];
                @endphp
                <x-task :data="$tasks[0]" />
                <x-task :data="$tasks[1]" />
            </div>
        </section>
    </main>
</x-layout>
