@extends('Layout.admin')
@section('header')

    @include('secciones.header_admin')

@endsection

@section('banner')

  <section id="" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>Gestion Noticias <span>HPO</span></h1>
      {{-- <h2>Pensamos en vos</h2> --}}
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
                    <a href="{{route('admin.noticias.new')}}" class="btn btn-outline-success w-auto" >Nueva Noticia</a>
                </div>
                <div class="table-responsive" id="seccionTabla">
                    <table class="table table-sm" id="tableNoticias" class="display compact" style="width:100%">
                        <thead class="table-success">
                        <tr>
                            <th>Titulo</th>
                            <th>Resumen</th>
                            <th>Cuerpo</th>
                            <th>Fecha</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($noticias as $noticia)  
                                <tr>
                                    <td>
                                        {{ $noticia->titulo}}                                
                                    </td>
                                    <td>
                                       {{$noticia->resumen}}
                                    </td>
                                    <td>{{ $noticia->cuerpo}}</td>
                                    <td>{{ $noticia->fecha_alta}}</td>
                                    <td>                                  
                                        <a href="{{route('admin.noticias.edit',$noticia->id)}}" class="editnoticia" id="edit_{{ $noticia->id}}"><i class="far fa-edit fa-2x"></i></a>
                                    </td>
                                    <td>
                                        <a href="javascript:;"
                                            onclick="eliminarnoticia({{ $noticia->id}});"><i class="fas fa-times fa-2x"></i></a>
                                        <form id="delete-form_{{ $noticia->id}}" action="{{ route('admin.noticias.destroy',$noticia->id) }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
        
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
function eliminarnoticia(idnoticia){
    if(confirm('Esta acción no podrá deshacerse. ¿Continuar?')){

        document.getElementById('delete-form_'+idnoticia).submit();
    }
}

const objDT = {
    "order": [],//para q respete la ordenacion q le digo en el controlador
    "lengthChange": false,//quita la eleccion de cant de filas a mostrar
    "searching": true,//false quita el campo de busqueda
    "language": {
    "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
    },
};
$(document).ready(function () {
    $('#tableNoticias').DataTable(objDT);
});
</script>
@endsection