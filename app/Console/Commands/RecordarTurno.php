<?php

namespace App\Console\Commands;

use App\Mail\RecordarTurnoEmail;
use App\Models\Agenda;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Console\Command;

class RecordarTurno extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'turno:recordar';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este CROM JOB se encargara de obtener cada turno en el dia para posteriormente recordarles a los pacientes que hoy tienen una cita en el centro medico';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //Enteoria el channel deberia crear y escribir un log aparte del de laravel pero no lo hace lo deje que escriba en el q vinee por defecto
        //Log::channel('crom_job')->error('**CROM-EMAIL: RECORDATORIO DE TURNOS**: entre al crom!!');
        $desde = date('Y-m-d')." 00:01:00";
        $hasta = date('Y-m-d')." 23:59:00";
        $agendas = Agenda::join('turnos', 'agendas.turno_id','turnos.id')
                        ->join('clinicas', 'turnos.clinica_id','clinicas.id')
                        ->join('pacientes', 'turnos.paciente_id','pacientes.id')
                        ->whereBetween('agendas.fecha_hora', [$desde, $hasta])
                        ->select('agendas.nombre_paciente','agendas.fecha_hora','clinicas.direccion','clinicas.nombre as nom_clinica','pacientes.email')
                        ->get();
        if (count($agendas) > 0) {
            foreach ($agendas as $value) {
                try {
                    if (! empty($value->email)) {
                        $data = array(
                            "paciente" => $value->nombre_paciente,
                            "direccion" => $value->direccion,
                            "horario" => $value->fecha_hora,
                            'clinica' => $value->nom_clinica
                        );
                        Mail::to($value->email)->queue(new RecordarTurnoEmail($data));
                    }
                } catch (\Throwable $th) {
                    Log::error('**CROM-EMAIL: RECORDATORIO DE TURNOS**: ' . $th->getMessage());
                }

            }
        }else{
            //Log::info('**CROM-EMAIL: RECORDATORIO DE TURNOS**: NO HAY REGISTROS PARA ENVIAR MAILS '. date('Y-m-d'));
            return 0;
        }
    }
}
