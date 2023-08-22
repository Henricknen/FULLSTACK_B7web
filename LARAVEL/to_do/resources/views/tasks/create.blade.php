<x-layout page="To_do_App_Login">
    <x-slot:btn>
        <a href="{{route('home')}}" class="btn btn-primary">
            Voltar
        </a>
    </x-slot:btn>

    <section id="create_task_section">
        <h1>Criar tarefa</h1>
        <form>
            <div class="inputArea">
                <label for="title">
                    Título da task
                </label>
                <input name="title" placeholder="Digite o titulo da tarefa" required />
            </div>

            <div class="inputArea">
                <label for="title">
                    Título da task
                </label>
                <input name="title" placeholder="Digite o titulo da tarefa" required />
            </div>
        </form>
    </section>
</x-layout>