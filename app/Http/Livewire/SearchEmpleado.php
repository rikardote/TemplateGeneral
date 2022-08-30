<?php

namespace App\Http\Livewire;

use App\Models\Employe;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class SearchEmpleado extends Component
{
    use LivewireAlert;

    public $search='';

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function searchEmpleado()
    {
        $employe_existe = Employe::where('num_empleado',$this->search)->first();
        if ($employe_existe) {
            return redirect()->route('empleado_incidencia.capturar',$this->search);
        }
        else{
            $this->reset('search');

            $this->alert('error', 'Error!', [
                'position' => 'center',
                'timer' => 2000,
                'toast' => false,
                'showConfirmButton' => false,
                'onConfirmed' => '',
                'text' => 'Empleado no encontrado, o no tienes acceso a el.',
            ]);
        }

    }
}
