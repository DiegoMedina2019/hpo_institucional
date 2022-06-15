<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    public function create($request, $paciente,$turno_id)
    {
        $this->fecha_hora = date('Y-m-d H:i:s',strtotime($request->fecha_turno." ".$request->hora_turno) );
        $this->nombre_paciente = $paciente->nombre.", ".$paciente->apellido;
        $this->telefono_paciente = $paciente->telefono_celular;
        $this->dni_paciente = $paciente->dni;

        if ($request->isEstudio) {
            $this->tipoestudio_id = $request->tipoestudio_id;
            $this->medico_id = 1;
        } else {
            $this->medico_id = $request->medico_id;
            $this->tipoestudio_id = 1;
        }

        $this->id_user_created = 1;
        $this->id_user_update = 1;
        $this->turno_id = $turno_id;

        $this->save();
    }
}
