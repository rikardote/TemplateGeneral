<?php

namespace App\Models;

use App\Models\Incidencia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Qna extends Model
{
    use HasFactory;
    protected $table = 'qnas';

    protected $guarded = [];
    //protected $appends = ['fullDescription'];

    protected function fullDescription(): Attribute
    {
        return new Attribute(
            get: fn($value,$attributes) => $attributes['qna'].'/'.$attributes['year'].' - '.$attributes['description']
        );
    }

}
