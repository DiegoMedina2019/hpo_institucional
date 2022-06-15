<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tu recordatorio de turno</title>
</head>
<body>
    <section class="inner-page">
        <div class="container">
            <div class="col-lg-12">
                <div class="portfolio-info">
                  <h3>¡Hola {{ $info['paciente'] }} te recordamos que hoy tenes un turno agendado!</h3>
                  
                </div>
                <div class="portfolio-description isCliente">
                  <h4>Clinica: {{ $info['clinica'] }}  -  Direccion: {{ $info['direccion'] }}</h4>
                  <h5>Fecha y hora: {{ date('d-m-Y H:i', strtotime( $info['horario'] ) ) }} </h5>

                </div>
            </div>
        </div>
    </section>
</body>
</html>