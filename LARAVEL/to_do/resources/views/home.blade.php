<x-layout page="To_do_App_Inicio">      {{-- tudo o que for comum entre as páginas será renderizado pelo componente 'layout' --}}

    <x-slot:btn>
        <a href="http://" class="btn btn-primary">
            Criar Tarefa
        </a>
        <a href="http://" class="btn btn-primary">
            Criar Tarefa
        </a>
    </x-slot:btn>
    <section class="graph">
        <div class="graph_header">
            <h2>Progresso do dia</h2>
            <div class="graph_header-line"></div>
            <div class="graph_header-date">
                <img src="/assets/images/icon-prev.png">
                    7/06
                <img src="/assets/images/icon-next.png">
            </div>
        </div>

        <div class="graph_header-subtitle">Tarefas: <b>3 / 6</b>

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
            <div class="task">
                <div class="title">
                    <input type="checkbox"/>
                    <div class="task_title">Titulo da Tarefa</div>
                </div>
                <div class="priority">
                    <div class="sphere">Titulo da Tarefa</div>
                </div>
                <div class="actions">
                    <a href="#">
                        <img src="/assets/images/icon-edit.png">
                    </a>
                    <a href="#">
                        <img src="/assets/images/icon-delete.png">
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-layout>