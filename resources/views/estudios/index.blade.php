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
      <h1>Gestion de Estudios <span>HPO</span></h1>
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
                  <h3>Ingresa tu DNI</h3>

                  @if ( ! empty( $paciente ) ) 
                      <p>{{$paciente->nombre}}</p>
                      
                  @endif

                  <form action="{{route('estudio.get')}}" method="get">
                    <div class="mb-3">
                        <input type="text" name="dni" id="dni" class="form-control">
                       {{--  @if (session('danger')) --}}
                            
                        <span class="badge bg-danger">{{ session('danger') }}</span>

                       {{--  @endif --}}
                    </div>
                    <button type="submit" class="btn btn-outline-primary" >¡Continuar!</button>

                  </form>
                </div>
            </div>
        </div>
    </section>

@endsection