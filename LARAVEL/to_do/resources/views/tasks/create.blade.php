<x-layout page="To_do_App_Login">
    <x-slot:btn>
        <a href="{{route('home')}}" class="btn btn-primary">
            Voltar
        </a>
    </x-slot:btn>

    <section id="task_section">
        <h1>Criar tarefa</h1>
        <form method="POST" action="{{route('task.create_action')}}">     {{-- o post deste formulario será enviado para 'tasck.create_action' --}}
            @csrf       {{-- 'csrf' é um token é ultilizado para proxima página validar, iindicando que não é um robo enviando --}}
            <x-form.text_input     {{-- utilizando o componente 'text_input' --}}
            name="title"
            label="Título da Tarefa"
            placeholder="Digite o titulo da sua tarefa" />

            <x-form.text_input
            type="datetime-local"
            name="due_date"
            label="Data de realização"
            placeholder="Digite o titulo da tarefa" />

            <x-form.select_input
            name="category_id"
            label="Categoria"
            placeholder="Digite o titulo da tarefa">
            @foreach ($categories as $category)
                <option value="{{$category-> id}}">{{$category-> title}}</option>
            @endforeach
            </x-form.select_input>

            <x-form.textarea_input
            label="Descrição da Tarefa"
            name="description"
            placeholder="Digite a descrição da tarefa" />

            <x-form.form_button submitTxt="Criar Tarefa" resetTxt="Resetar" /> {{-- ultilizando apenas um componente para renderizar os dois botões --}}

        </form>
    </section>
</x-layout>