@extends('Layout.app')
@section('header')

    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="/">Hospital privado de ojos<span>.</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="{{asset('plantilla/assets/img/logo.png')}}" alt=""></a>-->

        </div>
    </header>

@endsection

@section('banner')

  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>Noticias <span>HPO</span></h1>
      <h2>Enterate de lo ultimo</h2>
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
              <li><i class='bx bx-undo'></i><a href="{{route('home')}}">Volver</a></li>
              {{-- <li>Inner Page</li> --}}
            </ol>
          </div>
  
        </div>
    </section><!-- End Breadcrumbs -->
  
    <section id="portfolio-details" class="portfolio-details">
      <div class="container" data-aos="fade-up">
  
        <div class="section-title">
          
          <h3><span>Lo ultimo de nuestros profecionales</span></h3>
        </div>
        {{-- noticia grande --}}
        @foreach ($noticias  as $key => $noticia)
            <div class="row" data-aos="fade-up" data-aos-delay="100">
              <div class="card mb-3">
    
                @if ( $noticia->tipos_doc_id == 2 )
                  @if ($noticia->isEnlace == 1)
                    <iframe style="width: 100%;" height="500" src="{{$noticia->url_doc}}" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  @else
                    <iframe style="width: 100%;" height="500" src="{{asset($noticia->url_doc)}}" title="{{$noticia->nombre_doc}}" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  @endif
                
                @endif
                @if ( $noticia->tipos_doc_id == 1 )
                  <img src="{{asset($noticia->url_doc)}}" class="card-img-top" alt="{{$noticia->nombre_doc}}" style="height: 500px">
                @endif
    
    
                <div class="card-body">
                  <h5 class="card-title">
                    <a href="javascript:;">{{$noticia->titulo}}</a>
                  </h5>
                  <p class="card-text fst-italic">{{$noticia->resumen}}</p>
                  <p class="card-text ">{{$noticia->cuerpo}}</p>
                  <p class="card-text text-end"><small class="text-muted">Creada el {{date('d-m-Y H:i',strtotime($noticia->fecha_alta))}}</small></p>
                </div>
              </div>
            </div>
        @endforeach


      </div>
    </section>

@endsection