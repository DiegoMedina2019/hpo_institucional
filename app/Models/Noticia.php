<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;

    public function create($request)
    {
        $this->titulo = $request->titulo;
        $this->resumen = $request->resumen;
        $this->cuerpo = $request->cuerpo;
        $this->fecha_alta = date('Y-m-d H:i:s');
        $this->user_creador = auth()->user()->id;
        $this->save();
    }
    public function edit($request)
    {
        $this->titulo = $request->titulo;
        $this->resumen = $request->resumen;
        $this->cuerpo = $request->cuerpo;
        $this->save();
    }

    //1:N 
    public function documentos()
    {
        return $this->hasMany(NoticiaDoc::class,'noticias_id','id');
    }
}
