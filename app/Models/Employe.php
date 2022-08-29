<?php

namespace App\Models;

use App\Models\Horario;

use App\Models\Condicion;
use App\Models\Deparment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employe extends Model
{
    use HasFactory;
    protected $table = 'employees';

    protected $guarded = [];

    public function deparment()
    {
    	return $this->belongsTo(Deparment::class,'deparment_id','id');
    }

    public function horario()
    {
        return $this->belongsTo(Horario::class,'horario_id','id');
    }

    public function condicion()
    {
        return $this->belongsTo(Condicion::class,'condicion_id','id');
    }

    protected function fullName(): Attribute
    {
        return new Attribute(
            get: fn($value,$attributes) => $attributes['name'].' '.$attributes['father_lastname'].' '.$attributes['mother_lastname']
        );
    }
}
