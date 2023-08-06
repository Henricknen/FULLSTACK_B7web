<x-layout page="To_do_App_Inicio">      {{-- tudo o que for comum entre as páginas será renderizado pelo componente 'layout' --}}
    <x-slot:btn>
        <a href="{{route('task.create')}}" class="btn btn-primary">
            Criar Tarefa
        </a>
        <a href="{{route('logout')}}" class="btn btn-primary">
            Sair
        </a>
    </x-slot:btn>

    <section class="graph">
        <div class="graph_header">
            <h2>Progresso do dia - </h2>
            <div class="graph_header-line"></div>
            <div class="graph_header-date">

                <a href = "{{route('home', ['date'=> $date_prev_button])}}">      {{-- trasnformando o botão em um link --}}
                    <img src="/assets/images/icon-prev.png">
                </a>
                    {{$date_as_string}}     {{-- variável dinâmica --}}
                <a href = "{{route('home', ['date'=> $date_next_button])}}">
                    <img src="/assets/images/icon-next.png">
                </a> 
            
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
            <select class="list_header-select" onchange="changeTaskStatusFilter(this)">
                <option value="all_task">Todas as tarefas</option>
                <option value="task_pending">Tarefas pendentes</option>
                <option value="task_done">Tarefas realizadas</option>
            </select>
        </div>
        <div class="task_list">
            
            {{-- @foreach ($tasks as $task)      {{-- loop 'foreach' irá gerar as tasks --}
            <x-task :data= "$task" />        {{-- redenrizando 'task' que é a variável do foreach --}
            @endforeach --}}

            @foreach ($tasks as $task)
                <x-task :data="$task" />
            @endforeach

            

        </div>
        {{-- <x-task :data= $task /> --}}
    </section>

    <script>
        function changeTaskStatusFilter(e) {
            if(e.value == 'task_pending') {
                showAllTasks();
                document.querySelectorAll('.task_done'). forEach(function(element) {
                    element.style.display = 'none';
                })
            } else if (e.value == 'task_done') {
                showAllTasks();
                document.querySelectorAll('.task_pending'). forEach(function(element) {
                    element.style.display = 'none';
                })
            } else {
                showAllTasks();
            }
        }

        function showAllTasks() {       // função mostra todas as tasks
            document.querySelectorAll('.task'). forEach(function(element) {
                element.style.display = 'block';
            })
        }
    </script>

    <script>
        async function taskUpdate(element) {
            let status = element.checked;     // se 'status' for false estará desmarcando o elemento se for true estará marcando
            let taskId = element.dataset.id;        // pegando o 'id'
            let url = '{{route('task.update')}}';       // passando a rota dinamicamente para a variável 'url'
            let rawResult = await fetch(url, {          // 'rawResult' é o resultado cru
                method:'POST',
                headers:{
                    "Content-Type": "application/json",
                    accept:"application/json"
                },
                body: JSON.stringify({status, taskId, _token: '{{ csrf_token() }}'})
            });
            result = await rawResult.json();        // pegando o resultado geral da requisição
            if(result.success) {
                alert('Task atualizada com sucesso!');
            } else {
                element.checked = !status;
            }
        }
    </script>
</x-layout>