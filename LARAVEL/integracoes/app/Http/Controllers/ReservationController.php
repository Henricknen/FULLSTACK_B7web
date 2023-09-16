<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class ReservationController extends Controller {
    public function getReservations(Request $request) {     // pega as áreas disponíveis
        $array = ['error'=> '', 'list'=> []];
        $daysHelper = ['Dom', 'Seg', 'Ter', 'Quar'. 'Qui', 'Sex', 'Sáb'];
        
        $areas = Area::where('allowed', 1)-> get();     // pegando as áreas que são permitidas fazerem reservas

        foreach($areas as $area) {
            $dayList = explode(',', $area['days']);

            $dayGroups = [];        // array 'dayGroups' é o que vai ficar com o grupo de dias

            //      adiçionando o primerio dia
            $lastDay = intval(current($dayList));
            $dayGroups[] = $daysHelper[$lastDay];
            array_shift($dayList);      // remoção do primeiro item da lista

            // adiçionando dias relevantes
            foreach($dayList as $day) {
                if(intval($day) != $lastDay + 1) {
                    $dayGroups = $daysHelper[$lastDay];
                    $dayGroups = $daysHelper[$day];
                }
            }

            //      adiçionando o último dia
            $dayGroups[] = $daysHelper[end($dayList)];

            //      juntando as datas
            $dates = '';
            $close = 0;
            foreach($dayGroups as $group) {
                if($close === 0) {
                    $dates .= $group;
                } else {
                    $dates .= '-'. $group. ',';
                }
                $close = 1 - $close;
            }

            $dates = explode(',', $dates);
            array_pop($dates);     // removendo a virgula do final

            //      adiçionando o 'time'
            $start = date('H:i', strtotime($area['start-time']));
            $end = date('H:i', strtotime($area['end-time']));

            foreach($dates as $dKey=> $dValue) {
                $dates[$dKey] .= ' '. $start. 'as'. $end;
            }
            
            $arry['list'][] = [
                'id'=> $area['id'],
                'cover'=> asset('storage/'. $area['cover']),
                'title'=> $area['title'],
                'dates'=> 'dates'
            ];
        }
        
        return $array;
    }
}
