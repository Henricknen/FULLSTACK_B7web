<x-layout page="To_do_App_Login">

    <x-slot:btn>
        <a href="{{route('home')}}" class="btn btn-primary">
            Voltar
        </a>
    </x-slot:btn>

    <section id="task_section">
        <h1>Editar tarefa</h1>
        <form method="POST" action="{{route('task.edit_action')}}">
            @csrf       {{-- 'csrf' é um token é ultilizado para proxima página validar, iindicando que não é um robo enviando --}}
            <input type="hidden" name="id" value="{{$task-> id}}" />        {{-- passando o 'id' para o formulario --}}

            <x-form.checkbox_input      {{-- ultilizando componente de 'checkbox' --}}
            name="is_done"
            aria-label="Tarefa realizada?"
            checked="{{$task->is_done}}" 
            />
            
            <x-form.text_input
            type="datetime-local"
            name="due_date"
            label="Data de realização"
            value="{{$task-> due_date}}" />

            <x-form.select_input
            name="category_id"
            label="Categoria"
            placeholder="Digite a categoria da tarefa">
            @foreach ($categories as $category)
                <option value="{{$category-> id}}"
                    @if ($category-> id == $task-> category_id)
                        selected    
                    @endif
                    >{{$category-> title}}</option>
            @endforeach                
            </x-form.select_input>

            <x-form.textarea_input
            label="Descrição da Tarefa"
            name="description"
            placeholder="Digite a descrição da tarefa"
            value="{{$task-> description}}" />

            <x-form.form_button submitTxt="Atualizar Tarefa" resetTxt="Resetar" />      {{-- ultilizando apenas um componente para renderizar os dois botões --}}

        </form>
    </section>
</x-layout>