<x-layout page="To_do_App_Login">
    <x-slot:btn>
        <a href="{{route('home')}}" class="btn btn-primary">
            Voltar
        </a>
    </x-slot:btn>

    <section id="create_task_section">
        <h1>Criar tarefa</h1>
        <form>
            
            <x-form.text_input name="title" label="Título da Task" placeholder="Digite o titulo da sua Task" />     {{-- utilizando o componente 'text_input' --}}
            <x-form.text_input type="date" name="due_date" label="Data de realização" placeholder="Digite o titulo da tarefa" />
            
            <div class="inputArea">
                <label for="category">
                    Categoria
                </label>
                <select id="category" name="category" required>       {{-- 'select' category é 'required' obrigatorio seu preenchimento --}}
                    <option selected disabled value="">Seleçione a categoria</option>
                    <option>Valor qualquer</option>
                </select>
            </div>
            
            <div class="inputArea">
                <label for="title">
                    descrição da tarefa
                </label>
                <textarea name="description" placeholder="Digite uma descrição para sua task"></textarea>       {{-- textarea não é obrigado ser preenchido --}}
            </div>

            <div class="inputArea">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </section>
</x-layout>