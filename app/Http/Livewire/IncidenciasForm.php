<?php

namespace App\Http\Livewire;

use App\Models\Qna;

use App\Models\Periodo;
use Livewire\Component;
use App\Models\Incidencia;
use Illuminate\Support\Carbon;
use App\Models\CodigoIncidencia;
use Ramsey\Uuid\Nonstandard\Uuid;
use App\Http\Livewire\ShowIncidencias;

class IncidenciasForm extends Component
{
    public $codigosIncidencias, $codigodeincidencia_id = '';
    public $qna, $qna_id;
    public $periodos, $periodo_id;
    public $fecha_inicio;
    public $fecha_final;
    public $employe;
    public $showPeriodo = false;

    protected $listeners = [
        'openPeriodos' => 'openPeriodos',

    ];

    protected $rules = [
        'codigodeincidencia_id' => 'required',
        'qna_id' => '',
        'fecha_inicio' => 'required',
        'fecha_final' => 'required',
        'periodo_id' => '',
    ];

    public function mount($employe)
    {
        $this->codigosIncidencias = CodigoIncidencia::all()->sortBy('fullDescription')->pluck('id', 'fullDescription');
        $this->employe = $employe;
    }
    public function render()
    {
        return view('livewire.incidencias-form');
    }
    public function save()
    {
        $this->validate();

        Incidencia::create([
            'employee_id' => $this->employe->id,
            'codigodeincidencia_id' => $this->codigodeincidencia_id,
            'qna_id' => $this->getQna($this->fecha_inicio),
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_final' => $this->fecha_final,
            'periodo_id' => $this->periodo_id,
            'total_dias' => $this->getTotalDias($this->fecha_inicio,$this->fecha_final),
            'fecha_capturado' => Carbon::now(),
            'token' => Uuid::uuid1()->toString()
        ]);

        $this->emit('IncidenciaCreada',$this->employe->id);

    }
    public function openPeriodos()
    {
        if(in_array($this->codigodeincidencia_id,['16','25','42'])){
            $this->showPeriodo = true;
            $this->periodos = Periodo::all()->sortByDesc('year')->pluck('id', 'fullDescription');
        }
        else{
            $this->showPeriodo = false;
            $this->periodo_id = null;
        }

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
    public function getTotalDias($fecha_inicio,$fecha_final){
        $fecha_inicio = Carbon::createFromFormat('d/m/Y', $fecha_inicio);
        $fecha_final = Carbon::createFromFormat('d/m/Y', $fecha_final);
        $total_dias = $fecha_final->diffInDays($fecha_inicio)+1;

        return $total_dias;
    }
}
