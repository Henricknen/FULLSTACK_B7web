<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {
    public function index(Request $request) {       // método index que retornará a view 'home'

        // // $tasks = Task::all()->take(4); // seleçionando 4 'tasks'
        // $tasks = Task::whereDate('due_date', date('Y-m-d'))-> get(); // 'wherDate' seleçionando 'tasks' pela data aty
        // $AuthUser = Auth::user();       // incluindo dados do usuário autenticado
        // return view('home', ['tasks' => $tasks, 'AuthUser' => $AuthUser]);        // passando as 'tasks' e dados do usuário para view
        
        if($request-> date) {       // se houver uma data filtrada
            $filterDate = $request-> date;        // a variável '$filterDate' será definida como o resultado da filtragem
        } else {        // se não
            $filterDate = date('Y-m-d');      // '$filterDate' será a data atual
        }
        $carbonDate = Carbon::createFromDate($filterDate);      // biblioteca 'carbon' pega a data atual no formato de string

        $data['date_as_string'] = $carbonDate-> translatedFormat('d'). ' de '. ucfirst($carbonDate-> translatedFormat('M')); // traduzindo a string 'ucfirst' inseri a primeira letra em maicula

        $data['date_as_string'] = $carbonDate-> format('d \d\e M');
        $data['date_prev_button'] = $carbonDate-> addDay(-1)-> format('Y-m-d');       // voltando 1 dia
        $data['date_next_button'] = $carbonDate-> addDay(2)-> format('Y-m-d'); // avançando 1 dia

        $data['tasks'] = Task::whereDate('due_date', $filterDate)-> get();        // 'wherDate' procura por uma data espeçifica e '$filterDate' filtra uma data

        $data['AuthUser'] = Auth::user();       // incluidnso dados do usuário autenticado

        $data['tasks_count'] = $data['tasks']-> count();

        $data['undone_tasks_count'] = $data['tasks']-> where('is_done', false)-> count();

        return view('home', $data);
    }
}