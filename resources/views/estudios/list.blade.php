@extends('Layout.app')
@section('header')

    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="index.html">Hospital privado de ojos<span>.</span></a></h1>
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
                  <h3>Tus estudios</h3>

                  @if ( ! empty( $paciente ) ) 
                      <p>{{$paciente->nombre}}, {{$paciente->apellido}}</p>
                      
                  @endif

                    <div class="mb-3">
                        <div class="table-responsive">
                            <table class="table" id="estudios_TD">
                                <thead class="table-success">
                                  <tr>
                                    <th>#</th>
                                    <th>Estudio</th>
                                    <th>Archivo</th>
                                    <th></th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($estudios as $estudio)
                                    <tr id="{{$estudio->id}}">
                                        <td>{{$estudio->id}}</td>
                                        <td>{{$estudio->nombre}}</td>
                                        <td>{{$estudio->archivo}}</td>
                                        <td>
                                            <a class="btn btn-outline-info ajax" href="javascript:;" id="{{$estudio->id}}"><i class='bx bx-cloud-download'></i>Descargar</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
<script type="module" >
     const objDT = {
        "order": [],//para q respete la ordenacion q le digo en el controlador
        "lengthChange": false,//quita la eleccion de cant de filas a mostrar
        "searching": true,//false quita el campo de busqueda
        "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"
        },
    };
    $(document).ready(function () {
        $('#estudios_TD').DataTable(objDT);
    });

    const  generaDescargable = (data, name) => {
        var link = document.createElement('a');
        document.body.appendChild(link); //required in FF, optional for Chrome
        link.href = data;
        link.download = name;

        link.click();
        window.URL.revokeObjectURL(data);
        link.remove();
    }

    $(document).on('click','.ajax', function(e){
        //para salir de paso rapido en pruebas o prod
        let endpoint = (true)?"http://sistemahpo.hpotucuman.com.ar": "http://127.0.0.1:8001";
        $('#preloader2').show();
        let body = {
            file_id:$(this).prop('id')
        }
        $.ajax({
            type: "GET",
            url: endpoint+"/api/get_file",
            data: body,
            dataType: "json",
            beforeSend: function(){ 
            },
            error: function(jqxhr, textStatus, error){
                console.log(jqxhr.responseJSON.mjs);
                $('.toast-body').html('');
                $('.toast-body').html(jqxhr.responseJSON.mjs);
                toast.show()
                $('#preloader2').hide();
            },
            success: function(data){
                if (data.status) {
                    
                   // console.log(data.file_base64);
                    let string = "data:application/octet-stream;base64,"+data.file_base64;
                    let name = data.name;//"Factura nro. 56761312.pdf";
                    generaDescargable(string,name);

                    console.log(data);

                }else{
                    console.log(data);
                    $('.toast-body').html('');
                     $('.toast-body').html(data.mjs);
                     toast.show()
                }
                $('#preloader2').hide();
            }
        });
    })


</script>
@endsection