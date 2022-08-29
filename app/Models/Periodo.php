<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Periodo extends Model
{
    use HasFactory;

    protected $table = 'periodos';

    protected $guarded = [];
    //protected $appends = ['fullDescription'];

    protected function fullDescription(): Attribute
    {
        return new Attribute(
            get: fn($value,$attributes) => $attributes['periodo'].'/'.$attributes['year']
        );
    }
}
