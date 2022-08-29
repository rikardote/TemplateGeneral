<?php

namespace App\Models;

use App\Models\Periodo;
use App\Models\CodigoIncidencia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Incidencia extends Model
{
    use HasFactory;

    protected $table = 'incidencias';

    protected $guarded = [];
    protected $dates = ['fecha_inicio', 'fecha_final', 'fecha_capturado'];

    public function qna()
    {
        return $this->belongsTo(Qna::class);
    }
    public function codigo()
    {
        return $this->belongsTo(CodigoIncidencia::class,'codigodeincidencia_id');
    }
    public function periodo()
    {
        return $this->belongsTo(Periodo::class,'periodo_id');
    }
}
