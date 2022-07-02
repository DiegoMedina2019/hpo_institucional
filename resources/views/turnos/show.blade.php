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
  
    <section class="inner-page">
        <div class="container">
            <div class="col-lg-12">
                <div class="portfolio-info">
                  <h3>Los datos de su turno son los siguientes</h3>
                  
                </div>
                <div class="portfolio-description isCliente">
                  <h5>Clinica: {{ $clinica->nombre }}  -  Direccion: {{ $clinica->direccion }}</h5>
                  <hr>
                  @if ($isEstudio == 0)
                  <h5>Dr./Dra.: {{ $medico->nombre.", ".$medico->apellido }} </h5>
                  @else
                  <h5>Estudio: {{ $estudio->nombre }} </h5>
                  @endif
                  <h5>Paciente: {{ $paciente->nombre.", ".$paciente->apellido }} </h5>
                  <h5>Fecha y hora: {{ date('d-m-Y H:i', strtotime( $agenda->fecha_hora ) ) }} </h5>

                </div>
            </div>
        </div>
    </section>

@endsection