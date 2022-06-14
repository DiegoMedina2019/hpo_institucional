<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tu nuevo turno</title>
</head>
<body>
    <section class="inner-page">
        <div class="container">
            <div class="col-lg-12">
                <div class="portfolio-info">
                  <h3>Hola {{ $info['paciente']->nombre.", ".$info['paciente']->apellido }}, recivio este correo porque solicito un turno</h3>
                  
                </div>
                <div class="portfolio-description isCliente">
                  <h5>Clinica: {{ $info['clinica']->nombre }}  -  Direccion: {{ $info['clinica']->direccion }}</h5>
                  <hr>
                  @if ($info['isEstudio'] == 0)
                  <h5>Dr./Dra.: {{ $info['medico']->nombre.", ".$info['medico']->apellido }} </h5>
                  @else
                  <h5>Estudio: {{ $info['estudio']->nombre }} </h5>
                  @endif
                  <h5>Fecha y hora: {{ date('d-m-Y H:i', strtotime( $info['agenda']->fecha_hora ) ) }} </h5>

                </div>
            </div>
        </div>
    </section>
</body>
</html>