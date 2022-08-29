<?php

namespace App\Http\Livewire;

use App\Models\Incidencia;
use Livewire\Component;

class ShowIncidencias extends Component
{
    public $employe;
    public $incidencias;

    protected $listeners = ['IncidenciaCreada' => 'render'];

    public function mount($employe)
    {
        $this->employe = $employe;
    }

    public function render()
    {
        $this->incidencias = Incidencia::with('codigo','periodo')->where('employee_id',$this->employe->id)
            ->whereHas('qna', function ($query) {
                $query->where('active', '=', '1'); })
            ->get();
        return view('livewire.show-incidencias');
    }

    public function deleteIncidencia($token){
        $incidencia = Incidencia::where('token', $token)->first();
        $incidencia->delete();

    }

}
