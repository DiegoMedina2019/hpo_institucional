<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    protected $dias = array(
        1=>"Lunes",
        2=>"Martes",
        3=>"Miércoles",
        4=>"Jueves",
        5=>"Viernes"
    );
    



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $horarios = array();
        $allHorarios = array();
        $horarioAgenda = array();

        if ($request->ajax()) {

            $fecha = strtotime($request->fecha);
            $numDia = date("N",$fecha);
            $medico_id = $request->medico_id;
            $tipoestudio_id = $request->tipoestudio_id;

            if ($numDia >= 1 && $numDia <= 5) {

                if ($request->isEstudio == "true") {
                    $horaAtencion = Horario::where('tipoestudio_id',$tipoestudio_id )
                                             ->where('dia', $this->dias[$numDia])
                                             ->select('hora_inicial','hora_final')
                                             ->get();
                    $agendas = Agenda::where('tipoestudio_id',$tipoestudio_id )
                                        ->where('fecha_hora','LIKE',$request->fecha.'%')
                                        ->get();
                } else {
                    $horaAtencion = Horario::where('medico_id',$medico_id )
                                             ->where('dia', $this->dias[$numDia])
                                             ->select('hora_inicial','hora_final')
                                             ->get();
                    $agendas = Agenda::where('medico_id',$medico_id )
                                        ->where('fecha_hora','LIKE',$request->fecha.'%')
                                        ->get();
                }
                $mas15 = 15*60;
                foreach ($horaAtencion as $value) {
                    $hora_inicial = strtotime($value->hora_inicial);
                    $hora_final = strtotime($value->hora_final);
                    $acumulador = $hora_inicial;

                    while ($acumulador <= $hora_final) {
                        array_push($allHorarios,  date("H:i", $acumulador ) );
                        $horario = $acumulador+$mas15;
                        $acumulador = $horario;
                    }
                }
                
                foreach ($agendas as $value) {
                   $hora = date('H:i',strtotime($value->fecha_hora) );
                   array_push($horarioAgenda,  $hora );                   
                }
                
                $aux = array();
                foreach ($allHorarios as $key => $value) {
                    if (!in_array($value,$horarioAgenda)) {
                        array_push($aux,  $value );   
                    }
                }
                $horarios = $aux;

                return response()->json([
                    'mjs' => 'carga de horarios con exitos',
                    'status' => true,
                    'horarios' => $horarios
                ]);

            }else {
                return response()->json([
                    'err' => 'La fecha que se ingreso debe ser un dia habil de Lunes a Viernes',
                    'status' => false
                ]);
            }
            
        }
    }

    public function dias(Request $request)
    {
        $horarios = array();
        $allHorarios = array();
        $horarioAgenda = array();

        if ($request->ajax()) {

            $medico_id = $request->medico_id;
            $tipoestudio_id = $request->tipoestudio_id;
            $clinica_id = $request->clinica_id;

            if ($request->isEstudio == "true") {
                if ($tipoestudio_id != 1) {
                    $diasAtencion = Horario::where('tipoestudio_id',$tipoestudio_id )
                                                ->where('clinica_id',$clinica_id )
                                                ->select('dia')
                                                ->get();
                }else {
                    $diasAtencion = [];
                }
                $titulo = "Los dias habiles para este estudio son los siguientes:";
            } else {
                if ($medico_id != 1) {
                    $diasAtencion = Horario::where('medico_id',$medico_id )
                                            ->where('clinica_id',$clinica_id )
                                            ->select('dia')
                                            ->get();
                }else {
                    $diasAtencion = [];
                }
                
                $titulo = "Los dias laborales del medico seleccionado son los siguientes:";
            }
            $arr = array();
            
            foreach ($diasAtencion as  $value) {
                array_push($arr,$value);
            }

            if (count( $arr) > 0) {
                $result = $arr;//array_unique( $arr);
                return response()->json([
                    'mjs' => 'listado de dias recuperado',
                    'status' => true,
                    'diasAtencion' => $result,
                    'titulo' =>  $titulo
                ]);
            } else {
                return response()->json([
                    'err' => 'Lo sentimos actualmente no podremos asignar este turno. Pero puedes comunicarte con nosotros para resolverlo enviandonos un <a href="https://wa.me/03813688983?text=Hola%20necesito%20ayuda%20para%20generar%20un%20turno" target="_blank">Whatsapp</a>',
                    'status' => false
                ]);
            }               
               
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
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function show(Horario $horario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function edit(Horario $horario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Horario $horario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Horario  $horario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Horario $horario)
    {
        //
    }
}
