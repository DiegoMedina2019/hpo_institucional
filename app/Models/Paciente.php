<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    public function create($request)
    {
        $this->nombre = $request->nombre;
        $this->apellido = $request->apellido;
        $this->fecha_nacimiento = $request->fecha_nacimiento;
        $this->dni = $request->dni;
        $this->telefono_celular = $request->telefono_celular;
        $this->telefono_fijo = $request->telefono_fijo;
        $this->domicilio = $request->domicilio;
        $this->ciudad = $request->ciudad;
        $this->email = $request->email;
        $this->observaciones = $request->observaciones;
        $this->id_user_created = 1;
        $this->id_user_update = 1;

        $this->save();

    }
}
