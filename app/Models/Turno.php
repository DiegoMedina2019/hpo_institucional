<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    use HasFactory;

    public function create($request,$paciente_id)
    {
        $this->prioridad = "Normal";
        $this->fecha = date('Y-m-d');
        $this->obrasocial = ($request->servicio == "1" ) ? "Particular" :$request->obrasocial;
        $this->art = $request->art;
        $this->paciente_id = $paciente_id;
        $this->medico_id = $request->medico_id;
        $this->tipoestudio_id = $request->tipoestudio_id;
        $this->clinica_id = $request->clinica_id;
        $this->id_user_created = 1;
        $this->id_user_update = 1;
        $this->save();
    }
}
