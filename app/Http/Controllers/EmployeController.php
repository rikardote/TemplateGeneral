<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;

class EmployeController extends Controller
{

    public function index(){
        $employees = Employe::whereIn('deparment_id',['19','27'])->get();

        return view('backend.employees.index', compact('employees'));
    }

    public function CapturaIncidencia($num_empleado){
        $employe = Employe::with('deparment','horario','condicion')->where('num_empleado',$num_empleado)->first();

        return view('backend.employees.captura_incidencias', compact('employe'));
    }

}
