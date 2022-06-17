<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use App\Models\Estudio;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EstudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('estudios.index');
    }

    public function getEstudios(Request $request)
    {
        $validado = Validator::make($request->all(), [
            'dni'=>'required|numeric'
        ]);
        if ($validado->fails()) {
            return back()->with('danger','El dni es requerido');
        }
        $p = Paciente::where('dni',$request->dni)->get();
        
        if (count($p) > 0) {
            $paciente = $p[0];
            $estudios = Archivo::join('estudios','archivos.estudios_id','estudios.id')
                        ->join('tiposestudios','estudios.tipoestudio_id','tiposestudios.id')
                        ->where('estudios.paciente_id',$paciente->id)
                        ->select('archivos.id','archivos.archivo_nombre as archivo','url','tiposestudios.nombre')
                        ->get();
            return view('estudios.list',compact('estudios','paciente'));
        } else {
            return back()->with('danger','No tenemos registrado un paciente con el DNI: '.$request->dni);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudio  $estudio
     * @return \Illuminate\Http\Response
     */
    public function show(Estudio $estudio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudio  $estudio
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudio $estudio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudio  $estudio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudio $estudio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudio  $estudio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudio $estudio)
    {
        //
    }
}
