<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\GuestResource;
use App\Guest;

class CheckinResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function handleStayValue()
    {
        $dailys = [150, 120, 120, 120, 120, 120, 150]; // array para retornar o valor da diaria referente ao dia da semana
        $vehicle = [20, 15, 15, 15, 15, 15, 20]; // array para retornar o valor do adicional de veículo referente ao dia da semana
        $total = 0;
        $entranceDate = $this->entranceDate;
        $exitDate = $this->exitDate;
        $aditionalVehicle = $this->aditionalVehicle;

        // se o hospede ainda não houver realizado o checkout atribui a data atual para a data de saida
        if ($exitDate === null) {
            $exitDate = gmdate('Y-m-d\TH:i:s\Z');
        }

        // coleta o numero de dias entre as duas datas
        $diffDays = (strtotime($exitDate) - strtotime($entranceDate)) / 60 / 60 / 24;

        // confere se passou o horário limite da diaria
        $hour = date('H', strtotime($exitDate));
        $minute = date('i', strtotime($exitDate));

        if ($hour >= 16 && $minute > 30) {
            $diffDays++;
        }

        // percorre o range de datas para coletar os valores das diarias
        for ($i = 0; $i <= $diffDays; $i++) {
            $date = date('Y-m-d', strtotime($entranceDate . " + $i days"));

            $stayValue = $dailys[date('w', strtotime($date))];

            if ($aditionalVehicle === true) {
                $stayValue += $vehicle[date('w', strtotime($date))];
            }
            $total += $stayValue;
        }

        return $total;
    }

    public function toArray($request)
    {
        $total = $this->handleStayValue();

        return [
            'entranceDate' => gmdate('Y-m-d\TH:i:s\Z'),
            'exitDate' => $this->exitDate,
            'aditionalVehicle' => $this->aditionalVehicle,
            'stayValue' => "R$$total,00",
            'fkGuest' => new GuestResource(Guest::find($this->fkGuest))
        ];
    }
}
