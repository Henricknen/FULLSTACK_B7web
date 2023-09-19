<?php
namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Unit;
use App\Models\AreaDisabledDays;  
use App\Models\Reservation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller {
    public function setReservation($id, Request $request) { // reçebendo o 'id' e as 'informaçoes'
        $array = ['error' => ''];
        
        $validator = Validator::make($request->all(), [ // validando os dados
            'date' => 'required|date_format:Y-m-d',
            'time' => 'required|date_format:H:i:s',
            'property' => 'required'
        ]);
        if (!$validator->fails()) { // se 'valiadator' não tiver nenhuma falha faça {
            $date = $request->input('date');
            $time = $request->input('time');
            $property = $request->input('property');

            $unit = Unit::find($property);
            $area = Area::find($id);

            if ($unit && $area) {
                $can = true;

                $weekday = date('w', strtotime($date)); // Obtendo o dia da semana a partir da data

                $allowedDays = explode(',', $area['days']); // verificando se esta dentro dos dias díponiveis
                if (!in_array($weekday, $allowedDays)) {
                    $can = false;
                } else {
                    $start = strtotime($area['start_time']);
                    $end = strtotime('-1 hour', strtotime($area['end_time']));
                    $revtime = strtotime($time);
                    if ($revtime < $start || $revtime > $end) {
                        $can = false;
                    }
                }

                $existingDisabledDay = AreaDisabledDays::where('id_area', $id) // Mantenha o nome da classe como está
                    ->where('day', $date)
                    ->count();
                if ($existingDisabledDay > 0) {
                    $can = false;
                }

                $existingReservations = Reservation::where('id_area', $id) // verificando se tem reserva no mesmo dia/hora
                    ->where('reservation_date', $date . ' ' . $time)
                    ->count();
                if ($existingReservations > 0) {
                    $can = false; // se tiver alguma reseva no dia ou hora espeçifica $'can' será false
                }

                if ($can) {
                    $newReservation = new Reservation(); // criando a reserva
                    $newReservation->id_unit = $property;
                    $newReservation->id_area = $id;
                    $newReservation->reservation_date = $date . ' ' . $time;
                    $newReservation->save();
                } else {
                    $array['error'] = 'Reserva não permitida neste dia/ horario';
                    return $array;
                }
            } else {
                $array['error'] = 'Dados incorretos';
                return $array;
            }
        } else {
            $array['error'] = $validator-> errors()-> first();
            return $array;
        }

        return $array;
    }
    
    public function getDisabledDates($id) {     // reçecendo o 'id' da area espeçifica
        $array = ['error'=> '', 'list'=> []];

        $area = Area::find($id);        // pegando a 'area'
        if($area)  {        // verificando se 'area' existe
        
            $disabledDays = AreaDisabledDays::where('id_area', $id)-> get();      // dias deszabilitados 'disabled' padrão
            foreach($disabledDays as $disabledDay) {        
                $array['list'][] = $disabledDay['day'];     // lista dos dias que foram desabilitados
            }

            $allowedDays = explode(',', $area['days']);     // dias disponíveis
            $offDays = [];      // array de dias não disponíveis
            for($q = 0; $q < 7; $q++) {
                if(!in_array($q, $allowedDays)) {
                    $offDays = $q;
                }
            }

            $start = time();        // listando os dias proibidos + 3 meses pra frente
            $end= strtotime('+3 months');

            for(
                $current = $start;
                $current < $end;
                $current = strtotime('+1 day', $current)
            ) {
                $wd = date('w', $current);
                if(in_array($wd, $offDays)) {
                    $array['list'][] = date('Y-m-d', $current);
                }
            }

        } else {
            $array['error'] = 'Area inexitente';
            return $array;
        }

        return $array;
    }

    public function getTimes($id, Request $request) {
        $array = ['eeror'=> '', 'list'=> []];
        
        $validator = Validator::make($request-> all(), [
            'date'=> 'reuired|date_formart:Y-m-d'
        ]);
        if(!$validator-> fails()) {
            $date = $request-> input('date');       // pegando 'data'
            $area = Area::find($id);        // pegando 'Area'

            if($area) {
                $can = true;

                $existingDisabladDay = AreaDisabledDays::where('id_area', $id)      // verificando se é dia 'disabled'
                -> where('day', $date)
                -> count();
                if($existingDisabladDay > 0) {
                    $can = false;
                }

                $allowedDays = explode(',', $area['days']);         // verificando se é dia permitido
                $weekday = date('w', strtotime($date));
                if(!in_array($weekday, $allowedDays)) {     // se dia não estiver dentro do array '$weekday' '$allowedDays' então não é um dia permitido
                    $can = false;
                }

                if($can) {
                    $start = strtotime($area['start_time']);
                    $end = strtotime($area['end_time']);
                    $times = [];
                }

                for(
                    $lastTime = $start;
                    $lastTime < $end;
                    $lastTime = strtotime('+1 hour', $lastTime)
                ) {
                    $times = $lastTime;
                }

                $timeList = [];
                foreach($times as $time) {
                    $timeList[] = [
                        'id'=> date('H:i:s', $time),
                        'title'=> date('H:i', $time). '-'. date('H:i', strtotime('+1 hour', $time))     // aparecerá para o usuário
                    ];
                }

                $reservations = Reservation::where('id_area', $id)      // removendo as reservas
                -> whereBetween('reservation_date', [       // pegando todas reservas do dia todo
                    $date. '00:00:00',      // começo do dia
                    $date. '23:59:59'       // final do dia
                ])
                -> get();

                $toRemove = [];
                foreach($reservations as $reservation) {
                    $time = date('H:i:s', strtotime($reservation['reservation_date']));     // pegando a hora espeçifica da reserva
                    $toRemove[] = $time;        // jogando a hora espeçifica dentro do array 1toRemove'
                }

                foreach($timeList as $timeItem) {
                    if(!in_array($timeItem['id'], $toRemove)) {     // se não estiver dentro da lista 'toRemove'
                        $array['list'][] = $timeItem;       // será adiçionado na lista 'list'
                    }
                }

            } else {
                $array['error'] = 'Area inexistente';
                return $array;
            }

        } else {
            $array['error'] = $validator-> errors()-> first();
            return $array;            
        }
        
        return $array;
    }

    puublic function getMyReservation(Request $request) {
    $array = ['error'=> '', 'list'=> []];
    
    $property = $request-> input('property');       // reçebendo a 'propriedade'
    if($property) {
        $unit = Unit::find($property);
        if($unit) {     // verificando se a propriedade existe

            $reservation = Reservation::where('id_unit', $property)     // pegando o total das minhas reservas
            -> orderBy('reservation-date', 'DESC')
            -> get();

            foreach($reservations as $reservation) {
                $area = Area::find($reservation['id_area']);        // pegando informações de 'area'

                $daterev = date('d/m/Y H:i', strtotime($reservation['reservation_date']));
                $aftertime = date('H:1', strtotime('+1 hour', strtotime($reservation['reservation_date'])));
                $daterev .= 'á '. $aftertime;       // juntando 'data' com 'hora'

                $array['list'][] = [
                    'id'=> $reservation['id'],
                    'id_area'=> $reservation['id_area'],
                    'title'=> $area['title'],
                    'cover'e> asset('storagr/'. $area['cover']),
                    'datereserbed'=> $datarev
                ]
            }

        } else {
            $array['error'] = 'Propriedade inexistente';
            return $array;    
        }
    } else {
        $array['error'] = 'Propriedade necessaria';
        return $array;
    }
    
    return $array;
}
