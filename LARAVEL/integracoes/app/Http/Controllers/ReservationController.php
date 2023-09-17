<?php
namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Unit;
use App\Models\AreaDisabledDays;
use App\Models\Reservation;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller {
    public function getReservations(Request $request) {     // pega as áreas disponíveis
        $array = ['error'=> '', 'list'=> []];
        $daysHelper = ['Dom', 'Seg', 'Ter', 'Quar', 'Qui', 'Sex', 'Sáb'];  // Corrigido: Adicionado uma vírgula após 'Quar'

        $areas = Area::where('allowed', 1)->get();     // Corrigido: Removido espaço entre '->' e 'get()'

        foreach($areas as $area) {
            $dayList = explode(',', $area['days']);

            $dayGroups = [];        // array 'dayGroups' é o que vai ficar com o grupo de dias

            // Adicionando o primerio dia
            $lastDay = intval(current($dayList));
            $dayGroups[] = $daysHelper[$lastDay];
            array_shift($dayList);      // Remoção do primeiro item da lista

            // Adicionando dias relevantes
            foreach($dayList as $day) {
                if(intval($day) != $lastDay + 1) {
                    $dayGroups[] = $daysHelper[$day];
                }
                $lastDay = intval($day);  // Atualizado o último dia
            }

            // Adicionando o último dia
            $dayGroups[] = $daysHelper[end($dayList)];

            // Juntando as datas
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
            array_pop($dates);     // Removendo a vírgula do final

            // Adicionando o 'time'
            $start = date('H:i', strtotime($area['start_time']));
            $end = date('H:i', strtotime($area['end_time']));

            foreach($dates as $dKey=> $dValue) {
                $dates[$dKey] .= ' '. $start. ' às '. $end;
            }
            
            $array['list'][] = [
                'id'=> $area['id'],
                'cover'=> asset('storage/'. $area['cover']),
                'title'=> $area['title'],
                'dates'=> $dates  // Corrigido: Substituído 'dates' por $dates
            ];
        }
        
        return $array;
    }

    public function setReservation($id, Request $request) {     // reçebendo o 'id' e as 'informaçoes'
        $array = ['erroe'=> ''];  // Corrigido: Substituído 'erroe' por 'error'
        
        $validator = Validator::make($request->all(), [
            'date'=> 'required|date_format:Y-m-d',
            'time'=> 'required|date_format:H:i:s',
            'property'=> 'required'
        ]);
        if(!$validator->fails()) {
            $date = $request->input('date');
            $time = $request->input('time');
            $property = $request->input('property');

            $unit = Unit::find($property);      
            $area = Area::find($id);

            if($unit && $area) {
                $can = true;

                $weekday = date('w', strtotime($date));  // Adicionado: Obtendo o dia da semana a partir da data

                $allowedDays = explode(',', $area['days']);
                if(!in_array($weekday, $allowedDays)) {
                    $can = false;
                } else {
                    $start = strtotime($area['start_time']);
                    $end = strtotime('-1 hour', strtotime($area['end_time']));
                    $revtime = strtotime($time);
                    if($revtime < $start || $revtime > $end) {
                        $can = false;
                    }
                }

                $existingDisabledDay = AreaDisabledDays::where('id_area', $id)         
                ->where('day', $date)
                ->count();
                if($existingDisabledDay > 0) {
                    $can = false;
                }

                $existingReservations = Reservation::where('id_area', $id)       
                ->where('reservation_date', $date. ' '. $time)
                ->count();
                if($existingReservations > 0) {
                    $can = false;
                }

                if($can) {
                    $newReservation = new Reservation();
                    $newReservation->id_unit = $property;
                    $newReservation->id_area = $id;
                    $newReservation->reservation_date = $date. ' '. $time;
                    $newReservation->save();
                } else {
                    $array['error'] = 'Reserva não permitida';
                    return $array;
                }
            } else {
                $array['error'] = 'Dadso incorretos';
                return $array;
            }

        } else {
            $array['error'] = $validator->errors()->first();
            return $array;
        }

        return $array;
    }
}
