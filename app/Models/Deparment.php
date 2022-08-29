<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Deparment extends Model
{
    use HasFactory;
    protected $table = 'deparments';

    protected $guarded = [];

    protected function fullDescription(): Attribute
    {
        return new Attribute(
            get: fn($value,$attributes) => $attributes['code'].' - '.$attributes['description']
        );
    }
}
