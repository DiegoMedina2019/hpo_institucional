<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Art;
use App\Models\Clinica;
use App\Models\TipoEstudio;
use App\Models\Medico;
use App\Models\ObraSocial;
use App\Models\Paciente;
use App\Models\Turno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TurnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('turnos.index');
    }

    public function newPaciente()
    {
        return view('turnos.newPaciente');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //dd($request);
        $validado = Validator::make($request->all(), [
            'dni'=>'required|numeric'
        ]);
        if ($validado->fails()) {
            return back()->with('danger','El dni es requerido');
        }

        $paciente = Paciente::where('dni',$request->dni)->get();
        $isNuevo = true;

        $medicos = Medico::all();
        $obrassociales = ObraSocial::all();
        $arts = Art::all();
        $tiposestudios = TipoEstudio::all();
        $clinicas = Clinica::all();
       // dd(count( $paciente ) );
        if (count( $paciente ) > 0) {
            $paciente = $paciente[0];
            $isNuevo = false;
            return view('turnos.create',compact('paciente','isNuevo','medicos','obrassociales','tiposestudios','arts','clinicas'));
        }
        return view('turnos.create',compact('isNuevo','medicos','obrassociales','tiposestudios','arts','clinicas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request);
       if ( isset($request->paciente_id) ) {
            $validate = Validator::make($request->all(), [
                'medico_id'=>'required',
                'fecha_turno'=>'required',
                'hora_turno'=>'required',
            ]);
            if ($validate->fails() ) {
                return back()
                            ->withErrors($validate)
                            ->withInput($request->all());
            }
       } else {
            $validatePaciente = Validator::make($request->all(), [
                'nombre'=>'required',
                'apellido'=>'required',
                'fecha_nacimiento'=>'required',
                'telefono_celular'=>'required',
                'domicilio'=>'required',
                'ciudad'=>'required',
                'email'=>'required|email',
                'medico_id'=>'required',
                'fecha_turno'=>'required',
                'hora_turno'=>'required',
            ]);
            if ($validatePaciente->fails() ) {
                return back()
                            ->withErrors($validatePaciente)
                            ->withInput($request->all());
            }
       }

        if ($request->isEstudio) {
            $validateEstudio = Validator::make($request->all(), [
                'tipoestudio_id'=>'required',
            ]);
            if ($validateEstudio->fails()) {
                return back()
                            ->withErrors($validateEstudio)
                            ->withInput($request->all());
            }
        }
        $isEstudio = ($request->isEstudio)?1:0;
        try {

            if($request->isNuevo == 1){
                $paciente = new Paciente();
                $paciente->create($request);
            }else{
                $paciente = Paciente::find($request->paciente_id);
            }
            
            $fecha_hora = date('Y-m-d H:i:s',strtotime($request->fecha_turno." ".$request->hora_turno) );
            $listAgenda = Agenda::where('fecha_hora',$fecha_hora)->get();

            if (count($listAgenda) > 0 ) {
                return redirect('/')->with("error","Disculpe, posiblemente el turno que solicito ya fue asignado o alguien mas lo solicito antes, por favor eliga un fecha/horario distinta");
            }

            $turno = new Turno();
            $turno->create($request,$paciente->id);
    
            $agenda = new Agenda();
            $agenda->create($request,$paciente);

            $clinica = Clinica::find($turno->clinica_id);
            $medico = Medico::find($turno->medico_id);
            $estudio = TipoEstudio::find($turno->tipoestudio_id);
    
            return view('turnos.show',compact('turno','agenda','paciente','clinica','medico','isEstudio','estudio'));

        } catch (\Throwable $th) {
            return back()->with("error","Disculpe, posiblemente el turno que solicito ya fue asignado a alguien mas, por favor eliga un fecha/horario distinto");
        }


        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function show(Turno $turno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function edit(Turno $turno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Turno $turno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Turno  $turno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Turno $turno)
    {
        //
    }
}
