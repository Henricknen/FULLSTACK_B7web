<x-layout page="To_do_App_Login">
    <x-slot:btn>
        <a href="{{route('home')}}" class="btn btn-primary">
            Voltar
        </a>
    </x-slot:btn>

    <section id="create_task_section">
        <h1>Criar tarefa</h1>
        <form>
            <x-form.text_input     {{-- utilizando o componente 'text_input' --}}
            name="title"
            label="Título da Tarefa"
            placeholder="Digite o titulo da sua tarefa" />

            <x-form.text_input
            type="date"
            name="due_date"
            label="Data de realização"
            placeholder="Digite o titulo da tarefa" />

            <x-form.select_input name="category"
            label="Categoria"
            placeholder="Digite o titulo da tarefa">
                <option>Valor qualquer</option>
            </x-form.select_input>

            <x-form.textarea_input
            label="Descrição da Tarefa"
            name="description"
            placeholder="Digite a descrição da tarefa" />

            <x-form.form_button submitTxt="Criar Tarefa" resetTxt="Resetar" /> {{-- ultilizando apenas um componente para renderizar os dois botões --}}

        </form>
    </section>
</x-layout>