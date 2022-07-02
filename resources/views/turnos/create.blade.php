@extends('Layout.app')
@section('header')

    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="{{route('home')}}">Hospital privado de ojos<span>.</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="{{asset('plantilla/assets/img/logo.png')}}" alt=""></a>-->

        </div>
    </header>

@endsection

@section('banner')

  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>Gestion de turno <span>HPO</span></h1>
      <h2>Pensamos en vos</h2>
      <div class="d-flex">
        
      </div>
    </div>
  </section>

@endsection

@section('content')

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
  
          <div class="d-flex justify-content-between align-items-center">
            <h2><i class='bx bx-bookmark-alt'></i></h2>
            <ol>
              <li><i class='bx bx-undo'></i><a href="{{url('/')}}">Volver</a></li>
              {{-- <li>Inner Page</li> --}}
            </ol>
          </div>
  
        </div>
    </section><!-- End Breadcrumbs -->
  
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">
            <div class="col-lg-12">
                <div class="portfolio-info">
                  <h3>Especifique los datos correspondientes</h3>
                  <p class="fst-italic text-danger">
                    Asegurate de completar los campos con el asterisco (*)
                  </p>

                  <form action="{{route('turno.store')}}" method="post" >
                    @csrf
                    <input type="hidden" name="isNuevo" value="{{$isNuevo}}">

                    @if ($isNuevo)
                    <div class="row" id="seccion_paciente">

                      <div class="col-6">
                        <div class="mb-3">
                          <label for="nombre" class="form-label">Nombre *</label>
                          <input type="text" class="form-control" id="nombre" name="nombre">
                          <span class="badge bg-danger">{{ $errors->first('nombre') }}</span>
                        </div>
                        <div class="mb-3">
                          <label for="apellido" class="form-label">Apellido *</label>
                          <input type="text" class="form-control" id="apellido" name="apellido">
                          <span class="badge bg-danger">{{ $errors->first('apellido') }}</span>
                        </div>
                        <div class="mb-3">
                          <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento *</label>
                          <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento">
                          <span class="badge bg-danger">{{ $errors->first('fecha_nacimiento') }}</span>
                        </div>
                        <div class="mb-3">
                          <label for="dni" class="form-label">DNI *</label>
                          <input type="text" class="form-control" id="dni" name="dni">
                          <span class="badge bg-danger">{{ $errors->first('dni') }}</span>
                        </div>
                        <div class="mb-3">
                          <label for="telefono_celular" class="form-label">Telefono celular *</label>
                          <input type="text" class="form-control" id="telefono_celular" name="telefono_celular">
                          <span class="badge bg-danger">{{ $errors->first('telefono_celular') }}</span>
                        </div>
                      </div>
                      <div class="col-6">

                        <div class="mb-3">
                          <label for="telefono_fijo" class="form-label">Telefono fijo</label>
                          <input type="text" class="form-control" id="telefono_fijo" name="telefono_fijo">
                          
                        </div>
                        <div class="mb-3">
                          <label for="domicilio" class="form-label">Domicilio *</label>
                          <input type="text" class="form-control" id="domicilio" name="domicilio">
                          <span class="badge bg-danger">{{ $errors->first('domicilio') }}</span>
                        </div>
                        <div class="mb-3">
                          <label for="ciudad" class="form-label">Ciudad *</label>
                          <input type="text" class="form-control" id="ciudad" name="ciudad">
                          <span class="badge bg-danger">{{ $errors->first('ciudad') }}</span>
                        </div>
                        <div class="mb-3">
                          <label for="email" class="form-label">Email *</label>
                          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                          <span class="badge bg-danger">{{ $errors->first('email') }}</span>
                        </div>

                        <div class="mb-3">
                          <label for="observaciones" class="form-label">Observaciones</label>
                          <textarea class="form-control" placeholder="Deja alguna observacion aqui" id="observaciones" name="observaciones" style="height: 100px"></textarea>
                          
                        </div>
                        
                      </div>

                    </div>

                    @else
                      <h4>Paciente: {{$paciente->apellido.", ".$paciente->nombre}}</h4>
                      <input type="hidden" name="paciente_id" value="{{$paciente->id}}">                      

                    @endif

                    <hr>

                    <div class="mb-3 d-flex justify-content-center">
                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="isEstudio" name="isEstudio" >
                        <h5 class="form-check-label" for="isEstudio">Si quiere un turno para un estudio active esta opcion</h5>
                      </div>
                    </div>

                    <div class="row" id="seccion_turno">

                      <div class="col-6">    
                                          
                        <div class="mb-3">
                          <label class="form-label">Clinica *</label>
                          <select class="single form-control" name="clinica_id" id="clinica_id">
                            <option disabled selected>Selecciona una opcion</option>
                            @foreach ($clinicas as $clinica)
                              <option value="{{ $clinica->id }}"> {{ $clinica->nombre }}</option>
                            @endforeach
                          </select>
                          <span class="badge bg-danger">{{ $errors->first('clinica_id') }}</span>
                        </div>

                      </div>

                      <div class="col-6">

                        <div class="mb-3">
                          <label class="form-label">¿De las siguientes opciones cual posee?</label>
                          <select class="single form-control" name="servicio" id="servicio">
                            <option disabled selected>Selecciona una opción</option>
                            <option value="1">PARTICULAR</option>
                            <option value="2">OBRA SOCIAL</option>
                            <option value="3">ART</option>
                          </select>
                        </div> 

                      </div>

                    </div>


                    <div class="row">

                      <div class="mb-3 service_show" id="secc_art">
                        <label class="form-label">ART, si corresponde</label>
                        <select class="single form-control" name="art" id="art">
                          <option disabled selected>Selecciona una opción</option>
                          @foreach ($arts as $art)
                            <option value="{{ $art->nombre }}">{{ $art->nombre }}</option>
                          @endforeach
                        </select>
                      </div>
  
                      <div class="mb-3 service_show" id="secc_obra_social">
                        <label class="form-label">Obra social, si corresponde</label>
                        <select class=" single form-control" name="obrasocial" id="obrasocial">
                          <option disabled selected>Selecciona una opción</option>
                          <option value="Particular">Particular</option>
                          @foreach ($obrassociales as $obrasocial)
                            <option value="{{ $obrasocial->nombre }}">{{ $obrasocial->nombre }}</option>
                          @endforeach
                        </select>
                      </div>
  
                      <div class="mb-3 service_show" id="secc_particular">
                        <label class="form-label">Paciente</label>
                        <input type="text" name="particular" id="" value="Particular" placeholder="Particular" disabled class="form-control">
                      </div>

                    </div>

                    <div class="row">

                      <div class="mb-3">
                        <label class="form-label">Medico *</label>
                        <select class="single form-control" name="medico_id" id="medico_id">
                          <option disabled selected>Selecciona una opcion</option>
                          @foreach ($medicos as $medico)
                            <option value="{{ $medico->id }}">Dr./Dra. {{ $medico->apellido }}, {{ $medico->nombre }}</option>
                          @endforeach
                        </select>
                        <span class="badge bg-danger">{{ $errors->first('medico_id') }}</span>
                      </div>

                      <div class="mb-3" style="display: none;" id="seccion_estudio">
                        <label class="form-label">Estudio *</label>
                        <select class="single form-control" name="tipoestudio_id" id="tipoestudio_id">
                          <option disabled selected>Selecciona una opcion</option>
                          @foreach ($tiposestudios as $estudio)
                            <option value="{{ $estudio->id }}">{{ $estudio->nombre }}</option>
                          @endforeach
                        </select>
                        <span class="badge bg-danger">{{ $errors->first('tipoestudio_id') }}</span>
                      </div>

                      <div class="mb-3" style="display: none;" id="secc_dias">
                        <i class='bx bxs-calendar-check'></i>
                        <label class="form-label" id="titulo_list_dias">Los dias que atiende este medico son:</label>
                        <div id="list_dias">
                          <span class="badge bg-success">Lunes</span>
                          <span class="badge bg-success">Martes</span>
                          <span class="badge bg-success">Miercoles</span>
                          <span class="badge bg-success">Lunes</span>
                          <span class="badge bg-success">Martes</span>
                          <span class="badge bg-success">Miercoles</span>
                        </div>
                      </div>

                    </div>


                    <div class="row">

                      <div class="col-6">

                        <div class="mb-3">
                          <label for="fecha_turno" class="form-label">Fecha de turno *</label>
                          <input type="date" class="form-control" id="fecha_turno" name="fecha_turno" min="{{ date('Y-m-d',strtotime(date('Y-m-d').'+ 1 days')) }}" >
                          <span class="badge bg-danger">{{ $errors->first('fecha_turno') }}</span>
                        </div>

                      </div>

                      <div class="col-6">

                        <div class="mb-3">
                          <label class="form-label">Horarios disponibles *</label>
                          <select class="single form-control" name="hora_turno" id="hora_turno">
                            <option disabled selected>Selecciona una opción</option>
                          </select>
                          <span class="badge bg-danger">{{ $errors->first('hora_turno') }}</span>
                        </div>
                      </div>
                      

                    </div>


                    <button type="submit" class="btn btn-outline-primary">Solicitar turno</button>
                  </form>
                  
                </div>

            </div>
        </div>
    </section>

@endsection

@section('script')
<script>

  const fillSelectHorarios = (data) => {
    let $select = document.querySelector("#hora_turno");

    let option = "<option disabled selected>Selecciona una opción</option>"
    $('#hora_turno').append(option);

      data.forEach(hora => {  
        let option = $('<option>').val(hora).text(hora)
        $('#hora_turno').append(option);
      });
  }
  const limpiarHorarios = () => {
    let $select = document.querySelector("#hora_turno");
    for (let i = $select.options.length; i >= 0; i--) {
      $select.remove(i);
    }
  };

  const newTurno = (params) => {
      $.ajax({
          type: "GET",
          url: "{{route('dias')}}",
          data: params,
          dataType: "json",
          beforeSend: function(){ 
          },
          error: function(jqxhr, textStatus, error){
              console.log(jqxhr);
              
          },
          success: function(data){
              if (data.status) {

                  $('#titulo_list_dias').html('');
                  $('#titulo_list_dias').html(data.titulo);
                  $('#list_dias').html('');
                  data.diasAtencion.forEach(dia => {
                    $('#list_dias').append(
                      '<span class="badge bg-success">'+dia.dia+'</span>'
                      );
                  });
                    $('#secc_dias').show('slow')
              }else{
                  $('#titulo_list_dias').html('');
                  $('#titulo_list_dias').html(data.titulo);
                  $('#list_dias').html('');
                  $('#list_dias').append(data.err );
                  $('#secc_dias').show('slow')
                  console.log(data);
              }
              
          }
      }); 
  }

  $(document).ready(function () {       


    $(document).on('change','#isEstudio',function (e) {

      ($(this).is(':checked') ) ? $('#seccion_estudio').show('slow') : $('#seccion_estudio').hide('slow')
      $(this).val($(this).is(':checked')) //para poder enviar true cuando reciba el request del post en el controlador

    })

    $(document).on('change','#servicio',function (e) {

      $('.service_show').hide();

      ($(this).val() == 1)?
        $("#secc_particular").show('slow'):
        ($(this).val() == 2)?
        $("#secc_obra_social").show('slow'):
        ($(this).val() == 3)?
        $("#secc_art").show('slow'):'';


    })
    $(document).on('change','#fecha_turno',function (e) {
      

      let params = {
        medico_id : $('#medico_id').val(),
        tipoestudio_id : $('#tipoestudio_id').val(),
        isEstudio : $('#isEstudio').is(':checked'),
        _token : $('input[name=_token]').val(),
        fecha: $(this).val()
      }
      console.log(params)
            
        $.ajax({
            type: "GET",
            url: "{{route('horarios')}}",
            data: params,
            dataType: "json",
            beforeSend: function(){ 
            },
            error: function(jqxhr, textStatus, error){
                console.log(jqxhr);
                
            },
            success: function(data){
                if (data.status) {
                    
                    limpiarHorarios()
                    fillSelectHorarios(data.horarios)

                    $('.toast-body').html('');
                     $('.toast-body').html(data.mjs);
                     toast.show()
                }else{
                     $('.toast-body').html('');
                     $('.toast-body').html(data.err);
                     toast.show()
                    console.log(data);
                }
                
            }
        });       

        
    })


    $(document).on('change','#medico_id,#tipoestudio_id',function (e) {
      
      console.log( $('#tipoestudio_id').val());

      let params = {
        medico_id : $('#medico_id').val(),
        tipoestudio_id : $('#tipoestudio_id').val(),
        isEstudio : $('#isEstudio').is(':checked'),
        _token : $('input[name=_token]').val(),
      }
      //console.log(params)
      if ($('#isEstudio').is(':checked') && $('#tipoestudio_id').val() != null) {
        console.log("es estudio");
        newTurno(params);
      }else if ( !$('#isEstudio').is(':checked') && $('#medico_id').val() != null) {
        console.log("es medico");
        newTurno(params);
      }
  
    })


  })


</script>
@endsection