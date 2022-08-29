<?php

namespace App\Services;

use App\Models\Qna;
use App\Models\Periodo;
use Illuminate\Support\Carbon;

class EmployeService
{
    public function getTotalDias($fecha_inicio,$fecha_final)
    {
        $fecha_inicio = Carbon::createFromFormat('d/m/Y', $fecha_inicio);
        $fecha_final = Carbon::createFromFormat('d/m/Y', $fecha_final);
        $total_dias = $fecha_final->diffInDays($fecha_inicio)+1;

        return $total_dias;
    }

    public function getQna($fecha){
        $date  = Carbon::createFromFormat('d/m/Y', $fecha);
        $qna = $date->month * 2;
        if ($date->day < 16) {
            $qna-=1;
        }

        $qna = Qna::where('qna', '=', $qna)->where('year', '=', $date->year)->where('active', '=', '1')->first();
        if ($qna) {
            return $qna->id;
        }
        else{
            return false;
        }
    }

}
