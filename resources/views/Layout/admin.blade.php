<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ config('app.name') }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('plantilla/assets/img/logo_2.png')}}" rel="icon">
  <link href="{{asset('plantilla/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('plantilla/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('plantilla/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('plantilla/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('plantilla/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('plantilla/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('plantilla/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('plantilla/assets/css/style.css')}}" rel="stylesheet">

  <link href="{{asset('plantilla/assets/css/custom.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- =======================================================
  * Template Name: BizLand - v3.7.0
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
    @yield('header')
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
    @yield('banner')
  <!-- End Hero -->

  <main id="main">

    @yield('content')

    <div aria-live="polite" aria-atomic="true" class="bg-dark position-relative bd-example-toasts">

      <div class=" toast-container position-fixed p-3 bottom-0 start-50 translate-middle-x" style="z-index: 11">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header bg-primary text-white">
            <i class='bx bx-error'></i>
            <strong class="me-auto">¡Aviso!</strong>
            {{-- <small>11 mins ago</small> --}}
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body">
            Hello, world! This is a toast message.
          </div>
        </div>
      </div>

    </div>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">

          </div>
        </div>
      </div>
    </div>

    {{-- <div class="footer-top">
      <div class="container">
        <div class="row">



        </div>
      </div>
    </div> --}}

    <div class="container py-4">
      <div class="copyright">
        &copy; Derechos reservador por <strong><span>Ciatware</span></strong>.
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
        {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
      </div>
    </div>

  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('plantilla/assets/vendor/purecounter/purecounter.js')}}"></script>
  <script src="{{asset('plantilla/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('plantilla/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('plantilla/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('plantilla/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('plantilla/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('plantilla/assets/vendor/waypoints/noframework.waypoints.js')}}"></script>
  <script src="{{asset('plantilla/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('plantilla/assets/js/main.js')}}"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script>
        var toastLiveExample = document.getElementById('liveToast')

        var toast = new bootstrap.Toast(toastLiveExample)
  </script>

@if (session('error'))
    
  <script>
    let mjs = "{{ session('error') }}";
      $('.toast-body').html('');
      $('.toast-body').html(mjs);
      toast.show()
  </script>

@endif

  @yield('script')

</body>

</html>