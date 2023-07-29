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
                <input id="title" name="title" placeholder="Digite o titulo da tarefa" required />
            </div>
            
            <div class="inputArea">
                <label for="due_date">
                    Data de realização
                </label>
                <input type="date" id="due_date" name="due_date" placeholder="Digite o titulo da tarefa" required />
            </div>
            
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
        </form>
    </section>
</x-layout>