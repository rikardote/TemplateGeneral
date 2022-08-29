<?php

namespace App\Http\Livewire;

use App\Models\Periodo;
use Livewire\Component;
use App\Models\Incidencia;
use Illuminate\Support\Carbon;
use App\Models\CodigoIncidencia;
use Ramsey\Uuid\Nonstandard\Uuid;
use App\Http\Livewire\ShowIncidencias;
use EmployeServices;

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
            'qna_id' => EmployeServices::getQna($this->fecha_inicio),
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_final' => $this->fecha_final,
            'periodo_id' => $this->periodo_id,
            'total_dias' => EmployeServices::getTotalDias($this->fecha_inicio,$this->fecha_final),
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




}
