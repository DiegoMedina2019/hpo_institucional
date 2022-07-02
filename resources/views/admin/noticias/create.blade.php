@extends('Layout.admin')
@section('header')

    @include('secciones.header_admin')

@endsection

@section('banner')

  <section id="" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>Alta de Noticia <span>HPO</span></h1>
      <div class="d-flex">
        
      </div>
    </div>
  </section>

@endsection

@section('content')
<section id="portfolio-details" class="portfolio-details">
    <div class="container">
        <div class="col-lg-12">
            <div class="portfolio-info">
              <div class="row mb-3">
                <a href="{{route('admin.noticias')}}" class="btn btn-outline-info w-auto" >Volver</a>
              </div>

              <div class="row">


                  {{-- <div class="card">
                    <iframe style="width: 100%;" height="315" src="https://www.youtube.com/embed/_8MjEhfKRbI" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}

                   {{--  <img src="..." class="card-img-top" alt="..."> --}}
                   {{--  <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                  </div> --}}
                  

                <form class="row g-3" id="form_noticia" action="{{route('admin.noticias.store')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="col-12">
                    <label for="titulo" class="form-label">Titulo</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Una increible noticia">
                    <span class="badge bg-danger">{{ $errors->first('titulo')}}</span>
                  </div>
                  <div class="col-md-6">
                    <label for="resumen" class="form-label">Resumen</label>
                    <textarea class="form-control" id="resumen" rows="3" name="resumen"></textarea>
                    <span class="badge bg-danger">{{ $errors->first('resumen')}}</span>
                  </div>
                  <div class="col-md-6">
                    <label for="cuerpo" class="form-label">Cuerpo</label>
                    <textarea class="form-control" id="cuerpo" rows="3" name="cuerpo"></textarea>
                  </div>
                  

                  <hr>
                  {{-- <h4 class="text-center">Carga de archivo</h4> --}}
                  <div class="col-md-6">
                    <label for="tipo" class="form-label">Tipo de multimedia</label>
                    <select id="tipo" class="form-select" name="tipo">
                      <option selected>Elegir...</option>
                      @foreach ($tipoDocs as $tipoDoc)
                        <option value="{{$tipoDoc->id}}">{{$tipoDoc->tipo}}</option>
                      @endforeach
                    </select>
                    <span class="badge bg-danger">{{ $errors->first('tipo')}}</span>                    
                  </div>

                  <div class="col-md-6" style="display: none;" id="seccion_radio">
                    <label class="form-label">¿Es un video de Youtube?</label>
                    <div>

                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="isEnlace" id="Radio1" value="1">
                        <label class="form-check-label" for="Radio1">SI</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="isEnlace" id="Radio2" value="0" checked>
                        <label class="form-check-label" for="Radio2">NO</label>
                      </div>

                    </div>

                    <span class="badge bg-danger">{{ $errors->first('isEnlace')}}</span>
                  </div>
                  <div class="col-md-12" id="portada_file">
                    <label class="form-label">Elegir archivo de portada</label>
                    <input type="file" class="form-control" id="portada" name="portada">
                    <span class="badge bg-danger">{{ $errors->first('portada')}}</span>
                  </div>
                  <div class="col-md-12" style="display: none;" id="portada_link">
                    <label class="form-label">Adjuntar enlace</label>
                    <input type="text" class="form-control" id="link" name="link">
                    <span class="badge bg-danger">{{ $errors->first('link')}}</span>
                  </div>

                  <div class="col-12">
                    <a href="javascript:;" class="btn btn-outline-primary" id="crear" >Guardar</a>
                  </div>
                </form>
                
              </div>

            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
$(document).ready(function() {

  $(document).on('change','.form-check-input',function (e) {
   // alert($(this).val());
    if($(this).prop('id') == "Radio1") {
      $('#portada_link').show('slow')
      $('#portada_file').hide('slow')
    } else{
      $('#portada_link').hide('slow')
      $('#portada_file').show('slow')
    }
  })
  $(document).on('change','#tipo',function (e) {
    if($(this).val() == "2") {
      $('#seccion_radio').show('slow')
    } else{
      $('#seccion_radio').hide('slow')
      $('#portada_link').hide('slow')
      $('#portada_file').show('slow')
      $('#Radio2').prop('checked',true)
    }
  })

  $(document).on('click','#crear',function (e) {
    $('#preloader2').show();
    $('#form_noticia').submit();
  })

});

</script>
@endsection