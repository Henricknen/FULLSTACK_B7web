<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller {

    public function update(Request $request) {
        dd($request-> all());
    }

    public function index() {

    }

    public function create(Request $request)  {
        $categories = Category::all();      // pegando todas as categorias
        $data['categories'] = $categories;
        return view('tasks.create', $data);     // passando '$data' com índice categories para a view
    }

    public function create_action(Request $request) {
        $task = $request->only(['title', 'category_id', 'description', 'due_date']);
        $task['user_id'] = 1;


        $request->validate([        // '$request->validate' Isso garantirá que os campos obrigatórios 'title' 'category_id' 'description' 'due_date' sejam fornecidos antes de inserir os dados na tabela tasks
            'title' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'due_date' => 'required',
        ]);

        // $taskData = [
        //     'title' => $request->input('title'),
        //     'category_id' => $request->input('category_id'),
        //     'description' => $request->input('description'),
        //     'due_date' => $request->input('due_date'),
        //     'user_id' => 1, // definindo id aleatorio do usuario para testes
        // ];

        $dbTask = Task::create($task);        // Se desejar redirecionar para uma rota específica após a criação da tarefa, faça algo como:
        return redirect()->route('home');
    }

    public function edit(Request $request)  {
        $id = $request->id;

        $task = Task::find($id);
        if(!$task) {
            return redirect(route('home'));
        }

        $categories = Category::all();
        $data['categories'] = $categories;
        
        $data['task'] = $task;

        return view('tasks.edit', $data);
    }

    public function edit_action(Request $request) {     // método de edição
        $request_data = $request->only(['title', 'due_date', 'category_id', 'description']);      // dados da task que serão atualizados

        $request_data['is_done'] = $request-> is_done ? true: false;       // se foi enviado 'request is_done' checked será true 

        $task = Task::find($request->id);       // seleçionado task
        if(!$task) {
            return 'Erro task inexistente';
        }
        $task->update($request_data);
        $task->save();
        return redirect((route('home')));
        

    }

    public function delete(Request $request)  {        // método de deletar
        $id = $request-> id;

        $task = Task::find($id);

        if($task) {     // se hover 'task'
            $task ->delete();      // apaga o registro da tabela tasks com base no 'id' informadp
        }
        
        return redirect(route('home'));
    }
}
