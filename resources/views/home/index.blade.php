@extends('Layout.app')
@section('header')

{{--     <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="index.html">Hospital privado de ojos<span>.</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="{{asset('plantilla/assets/img/logo.png')}}" alt=""></a>-->

        <nav id="navbar" class="navbar">
            <ul>
            <li><a class="nav-link scrollto active" href="#hero">Inicio</a></li>
            <li><a class="nav-link scrollto" href="#about">Turnos</a></li>
            <li><a class="nav-link scrollto" href="#services">Servicios</a></li>
            <li><a class="nav-link scrollto" href="#team">Equipo</a></li>
            <li><a class="nav-link scrollto" href="#contact">Contacto</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        </div>
    </header> --}}
    @include('secciones.header')

@endsection
@section('banner')

  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>Bienvenidos a <span>HPO</span></h1>
      <h2>Tu clinica de ojos</h2>
      <div class="d-flex">
        <a href="#about" class="btn-get-started scrollto">Gestiona tu TURNO</a>
        <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
      </div>
    </div>
  </section>

@endsection
@section('content')
    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
        <div class="container" data-aos="fade-up">
  
          <div class="row">
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                <div class="icon"><i class="bx bx-file"></i></div>
                <h4 class="title"><a href="">Mision</a></h4>
                <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
              </div>
            </div>
  
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                <div class="icon"><i class="bx bx-world"></i></div>
                <h4 class="title"><a href="">Vision</a></h4>
                <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
              </div>
            </div>
  
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                <div class="icon"><i class='bx bxs-analyse'></i></div>
                <h4 class="title"><a href="">Valores</a></h4>
                <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
              </div>
            </div>
  
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
              <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
                <div class="icon"><i class="bx bx-tachometer"></i></div>
                <h4 class="title"><a href="">Objetivos</a></h4>
                <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
              </div>
            </div>
  
          </div>
  
        </div>
    </section><!-- End Featured Services Section -->
  
      <!-- ======= Turno Section ======= -->
    <section id="about" class="about section-bg">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Turnos</h2>
            <h3>Gestiona el proceso <span>tu mismo</span></h3>
            {{-- <p>puede ser un subtitulo</p> --}}
          </div>
  
          <div class="row">
            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
              <img src="{{asset('plantilla/assets/img/turno_imagen.jpg')}}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="100">
              <h3>Para solicitar tu turno solo debes seguir estos pasos:</h3>
              {{-- <p class="fst-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
              </p> --}}
              <ul>
                <li>
                  <i class='bx bx-check'></i>
                  <div>
                    <h5>Haz clic en el siguiente <a href="{{route('turno')}}" style="text-decoration-line: underline;">enlace</a></h5>
                    <p>Te llevara al formulario para el inicio del proceso</p>
                  </div>
                </li>
                <li>
                  <i class="bx bx-images"></i>
                  <div>
                    <h5>Carga los datos</h5>
                    <p>Una vez alli solo deberas suministrar los datos para tu registro, solo necesitas haber sido paciente de nuestra clinica, confirma la accion y listo. </p>
                  </div>
                </li>
              </ul>
              <p>
                Si necesitas mas informacion sobre el proceso puedes ir a la seccion de contacto para comunicarte con nosostros.
              </p>
            </div>
          </div>
  
        </div>
    </section><!-- End Turno Section -->
  
  
      <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Servicios</h2>
            <h3>Contamos con esta cartera de <span>Estudios</span></h3>
          </div>
  
          <div class="row">

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">

              <div class="swiper-wrapper">
      
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <div class="col-12 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
                      <div class="icon-box box_services">
                        <div class="icon"><i class='bx bx-pulse'></i></div>
                        <h4><a href="">Campo Visual computarizado</a></h4>
                        <p></p>
                      </div>
                    </div>
                  </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                  <div class="testimonial-item">                 
                    <div class="col-12 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                      <div class="icon-box box_services">
                        <div class="icon"><i class='bx bx-pulse'></i></div>
                        <h4><a href=""> VIDEOANGIOGRAFIA DIGITAL COMPUTARIZADA </a></h4>
                        <p></p>
                      </div>
                    </div>
                  </div>
                </div><!-- End testimonial item -->
      
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <div class="col-12 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                      <div class="icon-box box_services">
                        <div class="icon"><i class='bx bx-pulse'></i></div>
                        <h4><a href=""> RECUENTO ENDOTELIAL </a></h4>
                        <p></p>
                      </div>
                    </div>
                  </div>
                </div><!-- End testimonial item -->
      
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <div class="col-12 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                      <div class="icon-box box_services">
                        <div class="icon"><i class='bx bx-pulse'></i></div>
                        <h4><a href=""> EJERCICIOS ORTÓPTICOS </a></h4>
                        <p></p>
                      </div>
                    </div>
                  </div>
                </div><!-- End testimonial item -->
      
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <div class="col-12 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
                      <div class="icon-box box_services">
                        <div class="icon"><i class='bx bx-pulse'></i></div>
                        <h4><a href="">Ecografía</a></h4>
                        <p></p>
                      </div>
                    </div>
                  </div>
                </div><!-- End testimonial item -->
      
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <div class="col-12 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="100">
                      <div class="icon-box box_services">
                        <div class="icon"><i class='bx bx-pulse'></i></div>
                        <h4><a href="">Biometría</a></h4>
                        <p></p>
                      </div>
                    </div>
                  </div>
                </div><!-- End testimonial item -->
      
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <div class="col-12 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="200">
                      <div class="icon-box box_services">
                        <div class="icon"><i class='bx bx-pulse'></i></div>
                        <h4><a href="">Paquimetría</a></h4>
                        <p></p>
                      </div>
                    </div>
                  </div>
                </div><!-- End testimonial item -->
      
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <div class="col-12 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                      <div class="icon-box box_services">
                        <div class="icon"><i class='bx bx-pulse'></i></div>
                        <h4><a href="">Topografía</a></h4>
                        <p></p>
                      </div>
                    </div>
                  </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <div class="col-12 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                      <div class="icon-box box_services">
                        <div class="icon"><i class='bx bx-pulse'></i></div>
                        <h4><a href=""> LASER ARGON </a></h4>
                        <p></p>
                      </div>
                    </div>
                  </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <div class="col-12 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                      <div class="icon-box box_services">
                        <div class="icon"><i class='bx bx-pulse'></i></div>
                        <h4><a href="">  Agudeza visual </a></h4>
                        <p></p>
                      </div>
                    </div>
                  </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <div class="col-12 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                      <div class="icon-box box_services">
                        <div class="icon"><i class='bx bx-pulse'></i></div>
                        <h4><a href="">OCT</a></h4>
                        <p></p>
                      </div>
                    </div>
                  </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <div class="col-12 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                      <div class="icon-box box_services">
                        <div class="icon"><i class='bx bx-pulse'></i></div>
                        <h4><a href=""> RG </a></h4>
                        <p></p>
                      </div>
                    </div>
                  </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <div class="col-12 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                      <div class="icon-box box_services">
                        <div class="icon"><i class='bx bx-pulse'></i></div>
                        <h4><a href=""> RFG </a></h4>
                        <p></p>
                      </div>
                    </div>
                  </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <div class="col-12 d-flex align-items-stretch mt-4" data-aos="zoom-in" data-aos-delay="300">
                      <div class="icon-box box_services">
                        <div class="icon"><i class='bx bx-pulse'></i></div>
                        <h4><a href=""> YAG LASER </a></h4>
                        <p></p>
                      </div>
                    </div>
                  </div>
                </div><!-- End testimonial item -->

              </div>
              <div class="swiper-pagination"></div>

            </div>
  
          </div>
  
        </div>
    </section><!-- End Services Section -->
  
      <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="zoom-in">
  
        </div>
    </section><!-- End Testimonials Section -->
  
  
      <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
        <div class="container"  data-aos="zoom-in">
  
          <div class="section-title">
            <h2>Equipo</h2>
            <h3>Nuestros <span>profesionales</span></h3>
          </div>
  
          <div class="row">


            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">

              <div class="swiper-wrapper">
      
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <div class="member d-flex">
                      <div class="member-img">
                        <img src="{{asset('plantilla/assets/img/team/me5.jpg')}}" class="img-fluid" alt="">
                        <div class="social">
                        </div>
                      </div>
                      <div class="member-info">
                        <h4>Dr. Prof. Daniel Fernando Dilascio</h4>
                        
                        <span>
                          <ul>
                            <li>Médico UNT</li>
                            <li>Especialista en Oftalmología UBA (hospital de clínicas), Bs.As.</li>
                            <li>Doctorado en medicina.</li>
                            <li>Jefe de Servicio de Oftalmología Hospital Centro de Salud</li>
                            <li>Profesor Titular USP-T</li>
                            <li>Jefe de Trabajos Prácticos UNT</li>
                            <li>Miembro fundador SAPO (Sociedad Argentina Plástica Ocular)</li>
                            <li>Miembro CAO - SOT- SAO</li>
                          </ul>
                        </span>
                      </div>
                    </div>
                  </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                  <div class="testimonial-item">
      
                      <div class="member d-flex">
                        <div class="member-img">
                          <img src="{{asset('plantilla/assets/img/team/me6.jpg')}}"  class="img-fluid" alt="">
                          <div class="social">
                          </div>
                        </div>
                        <div class="member-info">
                          <h4>Dr. Prof. Sergio Adrián Dilascio</h4>
                          
                          <span>
                            <ul>
                              <li>Médico UNT</li>
                              <li>Especialista en Oftalmología FOA (Fundación Oftalmológica Argentina), Bs.As.</li>
                              <li>Servicio de Oftalmología Hospital Centro de Salud</li>
                              <li>Profesor Adjunto USP-T</li>
                              <li>Jefe de trabajos prácticos UNT</li>
                              <li>Miembro fundador Sociedad Argentina de Retina y Vítreo</li>
                              <li>Miembro CAO – SOT – SAO</li>
                            </ul>
                          </span>
                        </div>
                      </div>                   
                    
                  </div>
                </div><!-- End testimonial item -->
      
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <div class="member d-flex">
                      <div class="member-img">
                        <img src="{{asset('plantilla/assets/img/team/me7.jpg')}}"  class="img-fluid" alt="">
                        <div class="social">
                        </div>
                      </div>
                      <div class="member-info">
                        <h4>Dr. Prof. Elio Francisco Dilascio</h4>
                        
                        <span>
                          <ul>
                            <li>Profesor Plenario.</li>
                            <li>Miembro del Consejo de Maestros</li>
                            <li>Miembro de Número de la Academia de Ciencia de la Salud de la Facultad de Medicina UNT</li>                    
                            <li>Miembro Fundador CAO (Consejo Argentino de oftalmología)</li>
                            <li>Miembro Fundador SOT (Sociedad Oftalmológica Tucumán)</li>
                            <li>Miembro SAO</li>
                          </ul>
                        </span>
                      </div>
                    </div>
                  </div>
                </div><!-- End testimonial item -->
      
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <div class="member d-flex">
                      <div class="member-img">
                        <img src="{{asset('plantilla/assets/img/team/me1.jpeg')}}" class="img-fluid" alt="">
                        <div class="social">
                        </div>
                      </div>
                      <div class="member-info">
                        <h4>Dra. Prof. Graciela Graneros</h4>
                        
        
                        <span>
                          <ul>
                            <li>Médico oftalmóloga certificada por Academia Nacional de medicina -Consejo argentino de oftalmología. Recertificado por CCREM.</li>
                            <li>Servicio oftalmología Hospital Centro De Salud Zenón Santillán</li>
                            <li>Docente Facultad de Medicina UNT</li>
                            <li>Docente Facultad de Medicina USPT.</li>
                          </ul>
                        </span>
                      </div>
                    </div>
                  </div>
                </div><!-- End testimonial item -->
      
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <div class="member d-flex">
                      <div class="member-img">
                        <img src="{{asset('plantilla/assets/img/team/me2.jpeg')}}" class="img-fluid" alt="">
                        <div class="social">
                        </div>
                      </div>
                      <div class="member-info">
                        <h4>Dra. Patricia Susana Prieto.</h4>
                        
                        <span>
                          <ul>
                            <li>Médico Oftalmóloga Certificado por la Academia Nacional de Medicina. Certificada y Recertificada por UNT.</li>
                            <li>Servicio oftalmología Hospital Centro De Salud Zenón Santillán.</li>
                          </ul>
                        </span>
                      </div>
                    </div>
                  </div>
                </div><!-- End testimonial item -->
      
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <div class="member d-flex">
                      <div class="member-img">
                        <img src="{{asset('plantilla/assets/img/team/me3.jpeg')}}" class="img-fluid" alt="">
                        <div class="social">
                        </div>
                      </div>
                      <div class="member-info">
                        <h4>Dra. Celia Raquel Valdez</h4>
                        
                        <span>
                          <ul>
                            <li>Medico oftalmóloga certificada por la Academia Nacional de Medicina y certificada recertificada por la UNT</li>
                            <li>Presidente de la Caja de médicos e ingenieros de Tucumán.</li>
                          </ul>
                        </span>
                      </div>
                    </div>
                  </div>
                </div><!-- End testimonial item -->
      
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <div class="member d-flex">
                      <div class="member-img">
                        <img src="{{asset('plantilla/assets/img/team/me4.jpeg')}}" class="img-fluid" alt="">
                        <div class="social">
                        </div>
                      </div>
                      <div class="member-info">
                        <h4>Dra. Marcela Auad</h4>
                        
                        <span>
                          <ul>
                            <li>Especialista en oftalmología recertificado 2005-2010-2015</li>
                            <li>Master en oftalmología</li>
                            <li>Master en oftalmología pediátrica</li>
                            <li>Docente UNT</li>
                            <li>Jede de trabajos prácticos facultad de medicina UNT</li>
                          </ul>
                        </span>
                      </div>
                    </div>
                  </div>
                </div><!-- End testimonial item -->
      
                <div class="swiper-slide">
                  <div class="testimonial-item">
                    <div class="member d-flex">
                      <div class="member-img">
                        <img src="{{asset('plantilla/assets/img/team/me8.jpg')}}" class="img-fluid" alt="">
                        <div class="social">
                        </div>
                      </div>
                      <div class="member-info">
                        <h4>Dra. Eulalia Inés Taritolay</h4>
                        
                        <span>
                          <ul>
                            <li>Oftalmología Laboral</li>
                            <li>Jubilada como oftalmólogo de la Cátedra de Oftalmología de la U.N.T.</li>
                            <li>Médico oftalmólogo del Hospital Carrillo de Yerba Buena</li>
                          </ul>
                        </span>
                      </div>
                    </div>
                  </div>
                </div><!-- End testimonial item -->

              </div>
              <div class="swiper-pagination"></div>

            </div>

  
          </div>
  
        </div>
    </section><!-- End Team Section -->
  
      <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Contactos</h2>
            <h3><span>Puede comunicarse con notros</span></h3>
            {{-- <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p> --}}
          </div>
  
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-6">
              <div class="info-box mb-4">
                <i class="bx bx-map"></i>
                <h3>Nuetra dirección</h3>
                <p>Batalla de Ayacucho 276, San Miguel de Tucumán, Tucumán</p>
              </div>
            </div>
  
            <div class="col-lg-6 col-md-6">
              <div class="info-box  mb-4">
                <i class="bx bx-phone-call"></i>
                <h3>Llamanos</h3>
                <p>+54 03813688983</p>
              </div>
            </div>
  
          </div>
  
          <div class="row" data-aos="fade-up" data-aos-delay="100">
  
            <div class="col-lg-12 ">
              <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d1585.8872051894743!2d-65.21028307437987!3d-26.833698607817972!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sclina%20de%20ojo%20hpo%20san%20miguel%20de%20tucuman!5e0!3m2!1ses-419!2sar!4v1652753029417!5m2!1ses-419!2sar" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  
            </div>
  
          </div>
  
        </div>
    </section><!-- End Contact Section -->
    
@endsection