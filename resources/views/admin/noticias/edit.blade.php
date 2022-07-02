@extends('Layout.admin')
@section('header')

    @include('secciones.header_admin')

@endsection

@section('banner')

  <section id="" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>Edicion de Noticia <span>HPO</span></h1>
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

                <form class="row g-3" id="form_noticia_edit" action="{{route('admin.noticias.update',$noticia->id)}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="col-12">
                    <label for="titulo" class="form-label">Titulo</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Una increible noticia" value="{{$noticia->titulo}}">
                    <span class="badge bg-danger">{{ $errors->first('titulo')}}</span>
                  </div>
                  <div class="col-md-6">
                    <label for="resumen" class="form-label">Resumen</label>
                    <textarea class="form-control" id="resumen" rows="3" name="resumen">{{$noticia->resumen}}</textarea>
                    <span class="badge bg-danger">{{ $errors->first('resumen')}}</span>
                  </div>
                  <div class="col-md-6">
                    <label for="cuerpo" class="form-label">Cuerpo</label>
                    <textarea class="form-control" id="cuerpo" rows="3" name="cuerpo">{{$noticia->cuerpo}}</textarea>
                  </div>
                  

                  <hr>
                  @php
                      $isVideo = false;
                      $isImg = false;
                      $seccion_radio = "none";
                      $radio1 = "";
                      $radio2 = "checked";
                      $portada_file = "block";
                      $portada_link = "none";

                      if ($docs->tipos_doc_id == 2) {
                        $isVideo = true;
                        $seccion_radio = "block";
                        if ($docs->isEnlace == 1){
                          $radio1 = "checked";
                          $radio2 = "";
                          $portada_link = "block";
                          $portada_file = "none";
                        }else {
                          $radio1 = "";
                          $radio2 = "checked";
                          $portada_link = "none";
                          $portada_file = "block";
                        }
                      }
                      if ($docs->tipos_doc_id == 1) {
                        $isImg = true;
                      }
                  @endphp
                  {{-- <h4 class="text-center">Carga de archivo</h4> --}}
                  <div class="card mb-3" {{-- style="max-width: 540px;" --}} >
                    <div class="row g-0">
                      <div class="col-md-4">
                        @if ( $isVideo )
                          @if ($docs->isEnlace == 1)
                            <iframe style="width: 100%;" height="350" src="{{$docs->url_doc}}" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                          @else
                            <iframe style="width: 100%;" height="350" src="{{asset($docs->url_doc)}}" title="{{$docs->nombre_doc}}" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                          @endif
                         
                        @endif
                        @if ( $isImg )
                          <img src="{{asset($docs->url_doc)}}" class="img-fluid rounded-start" alt="{{$docs->nombre_doc}}">
                        @endif
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">Archivo de portada actual</h5>
                          <div class="col-md-6">
                            <label for="tipo" class="form-label">Tipo de multimedia</label>
                            <select id="tipo" class="form-select" name="tipo">
                              <option selected>Elegir...</option>
                              @foreach ($tipoDocs as $tipoDoc)
                                <option
                                  @if ($tipoDoc->id == $docs->tipos_doc_id)
                                      {{'selected'}}
                                  @endif 
                                  value="{{$tipoDoc->id}}">{{$tipoDoc->tipo}}</option>
                              @endforeach
                            </select>
                            <span class="badge bg-danger">{{ $errors->first('tipo')}}</span>                    
                          </div>
        
                          <div class="col-md-6" style="display: {{$seccion_radio}};" id="seccion_radio">

                            <label class="form-label">¿Es un video de Youtube?</label>
                            <div>
        
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="isEnlace" id="Radio1" value="1" {{$radio1}}>
                                <label class="form-check-label" for="Radio1">SI</label>
                              </div>
                              <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="isEnlace" id="Radio2" value="0" {{$radio2}}>
                                <label class="form-check-label" for="Radio2">NO</label>
                              </div>
        
                            </div>        
                            <span class="badge bg-danger">{{ $errors->first('isEnlace')}}</span>

                          </div>

                          <div class="col-md-12" id="portada_file" style="display: {{$portada_file}};">
                            <label class="form-label">Elegir archivo de portada</label>
                            <input type="file" class="form-control" id="portada" name="portada" >
                            <span class="badge bg-danger">{{ $errors->first('portada')}}</span>
                          </div>
                          <div class="col-md-12" style="display: {{$portada_link}};" id="portada_link">
                            <label class="form-label">Adjuntar enlace</label>
                            <input type="text" class="form-control" id="link" name="link" value="{{$docs->nombre_doc}}">
                            <span class="badge bg-danger">{{ $errors->first('link')}}</span>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-12">
                    <a href="javascript:;" class="btn btn-outline-primary" id="editar" >Guardar</a>
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

  $(document).on('click','#editar',function (e) {
    $('#preloader2').show();
    $('#form_noticia_edit').submit();
  })

});

</script>
@endsection