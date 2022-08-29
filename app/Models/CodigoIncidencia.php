<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CodigoIncidencia extends Model
{
    use HasFactory;
    protected $table = 'codigos_de_incidencias';

    protected $guarded = [];
    //protected $appends = ['fullDescription'];

    protected function fullDescription(): Attribute
    {
        return new Attribute(
            get: fn($value,$attributes) => $attributes['code'].' - '.$attributes['description']
        );
    }
}
