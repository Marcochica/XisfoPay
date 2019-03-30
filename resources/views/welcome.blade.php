<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Xisfo Pay') }}</title>
    <meta name="description" content="Trabajamos con empresas que tengan su dinero en cuentas en Estados Unidos y/o Paxum; Una vez realice la transferencia a nuestras cuentas y a su vez esta sea confirmada por  nuestro equipo de trabajo, se hará efectivo su depósito descontando nuestra comisión.">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta property="og:title" content="Xisfo Pay - Una Manera fácil de transferir y recibir dinero">
    <meta property="og:type" content="website">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <!--[if lt IE 9]>
    <script src="script/html5shiv.min.js"></script>
    <![endif]-->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <!-- Scripts -->

</head>
<body>
    <div id="app">
    	<section class="panel home" data-section-name="xisfo-pay" style="height:851px;">
	    	<img class="contenedor_app img-fluid" src="{{ asset('imgs/fondo_seccion1.jpg') }}" alt="Fondo Seccion Home">
	    	<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
	            <div class="contenedor_header">
	            	<div class="container-fluid container_welcome">
	            		<div class="row no-gutters">
	            			<div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3">
				                <a class="navbar-brand" href="/">
				            		<img src="{{ asset('imgs/logo-xisfo-pay.png') }}" alt="Logo Xisfo Pay" class="logo_xisfopay img-fluid">
				                </a>
				            </div>
				            <div class="d-none d-sm-none d-md-none d-lg-block col-lg-5 d-xl-block col-xl-5">
				                <div class="menu_main">
				                	<ul>
				                		<li><a href="">Inicio</a></li>
				                		<li><a href="#overview" class="como_funciona scroll">Como Funciona</a></li>
				                		<li><a onclick="ScrollTo('configuration')">¿Porqué Elegirnos?</a></li>
										<li><a href="" data-toggle="modal" data-target="#modalLRFormDemo3">Contacto</a></li>
				                	</ul>
				                </div>
				            </div>
				            <div class="d-none d-sm-none d-md-none d-lg-block col-lg-2 d-xl-block col-xl-2">
				                <div class="redes">
				                	<a href="https://twitter.com/xisfopay" target="_blank"><i class="fab fa-twitter"></i></a>
				                	<a href="https://www.instagram.com/xisfopay/" target="_blank"><i class="fab fa-instagram"></i></a>
				                	<i class="fab fa-google-play"></i>
				                	<i class="fab fa-apple"></i>
				                </div>
				            </div>
				            <div class="col-6 col-sm-6 col-md-6 col-lg-2 col-xl-2">
				                <div class="navbar-collapse" id="navbarSupportedContent2">
                                    @if (Route::has('login'))
                                        <div class="top-right links">
                                            @auth
                                                <a href="{{ url('/home') }}">Dashboard</a>
                                            @else
                                                <a href="{{ route('login') }}" class="nav-link inicio_sesion">Iniciar Sesión</a>

                                                @if (Route::has('register'))
                                                    <a href="{{ route('register') }}" class="nav-link registro">Abre tu Cuenta</a>
                                                @endif
                                            @endauth
                                        </div>
                                    @endif
				                </div>
				            </div>
			            </div>
		            </div>
	            </div>
	        </nav>

	      <div class="container">
	        <div class="row no-gutters">
	          <div class="col-12 col-sm-9 col-md-6 col-lg-5 text_panel1">
	            <h3>Una Manera <span>Fácil</span></h3>
	            <h3>de Transferir y Recibir Dinero</h3>
	            <a href="{{ route('register') }}">Abre tu cuenta gratis</a>
	          </div>
	          <div class="col-12 text-center container_scroll">
	            <a href="#overview" class="scroll">
	              <img src="{{ asset('imgs/mouse-scroll.png') }}" class="img-fluid" alt="Mouse Scroll">
	              <span>Scroll Hacia Abajo</span>
	            </a>
	          </div>
	        </div>
	      </div>
	    </section>
	    <section class="panel overview" data-section-name="como-funciona" style="height:851px;" id="overview">
	      <img class="img_seccion2 img-fluid" src="{{ asset('imgs/fondo_seccion2.jpg') }}" alt="Fondo Sección Overview">
	      <div class="info1_overview" >
	        <div class="row no-gutters">
	          <div class="col-12 text-center container_overview">
	            <div class="container">
	              <div class="row">
	                <div class="col-12">
	                  <h3>¿XISFO PAY?</h3>
	                  <p>
	                    Trabajamos con empresas que tengan su dinero en cuentas en el exterior; Una vez realice la transferencia a nuestras cuentas y a su vez esta sea confirmada por  nuestro equipo de trabajo, se hará efectivo su depósito descontando nuestra comisión.
	                  </p>
	                  <img src="{{ asset('imgs/icono-play-video-xisfo-pay.png') }}" alt="Video Xisfo Pay" class="img-fluid">
	                  <h3>¿Como Funciona?</h3>
	                </div>
	                <div class="col-12 col-sm-6 text-center casos">
	                  <div class="container_funciona">
	                    <span><a href="" data-toggle="modal" data-target="#modalLRFormDemo">Caso 1</a></span>
	                  </div>
	                </div>
	                <div class="col-12 col-sm-6 text-center casos">
	                  <div class="container_funciona">
	                    <span><a href="" data-toggle="modal" data-target="#modalLRFormDemo2">Caso 2</a></span>
	                  </div>
	                </div>
	              </div>
	            </div>
	          </div>
	          <div class="col-12 text-center container_scroll">
	            <a href="#configuration" class="scroll">
	              <img src="{{ asset('imgs/mouse2-scroll.png') }}" class="img-fluid" alt="Mouse Scroll">
	              <span>Scroll Hacia Abajo</span>
	            </a>
	          </div>
	        </div>
	      </div>
	    </section>
	    <section class="panel configuration" data-section-name="porque-elegirnos" style="height:851px;">
	      <img class="img_seccion3 img-fluid" src="{{ asset('imgs/fondo_seccion3.jpg') }}" alt="Fondo Sección Overview">
	      <div class="info_container_configuration" id="configuration">
	          <div class="row no-gutters align-items-center">
	            <div class="row no-gutters">
	              <div class="col-12 container_configuration">
	                <div class="row no-gutters">
	                  <div class="col-12 col-sm-12 col-md-5">
	                    <h3>¿Por Qué</h3>
	                    <h3>Elegirnos?</h3>
	                    <p>
	                    Nuestra empresa cuenta con el reconocimiento de estudios webcam ubicados en ciudades como Medellín, Cali, Bogotá y Eje Cafetero, lo más importante para nosotros es el cumplimiento, esto trae credibilidad y fiabilidad, más de 1 año realizando nuestro proceso y cada vez mejorando, estamos seguros que podemos ser su aliado estratégico, optimizando su flujo de caja y entregando tranquilidad en sus ingresos.
	                    <br><br>
	                    Cualquier inquietud no dude en consultarnos con gusto le atenderemos.
	                    </p>
	                  </div>
	                  <div class="col-12 col-sm-12 col-md-7">
	                    <div class="row no-gutters">
	                      <div class="col-6 col-sm-6 rapidez">
	                        <div class="container_elegirnos">
	                        	<div class="row no-gutters">
	                        		<div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-4">
	                          			<i class="sprite sprite-flash-_1_"></i>
	                        		</div>
	                        		<div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-8">
										  <span>Rapidez</span>
										  <a href="" data-toggle="modal" data-target="#modalLRFormDemo5">Conoce más</a>
	                        		</div>
	                        	</div>
	                        </div>
	                      </div>
	                      <div class="col-6 col-sm-6 seguridad">
	                        <div class="container_elegirnos">
	                        	<div class="row no-gutters">
	                        		<div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-4">
	                          			<i class="sprite sprite-shield-_1_"></i>
	                          		</div>
	                        		<div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-8">
										  <span>Seguridad</span>
										  <a href="" data-toggle="modal" data-target="#modalLRFormDemo6">Conoce más</a>
	                        		</div>
	                        	</div>
	                        </div>
	                      </div>
	                      <div class="col-6 col-sm-6 acompanamiento">
	                        <div class="container_elegirnos">
	                        	<div class="row no-gutters">
	                        		<div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-4">
	                          			<i class="sprite sprite-manager"></i>
	                         		</div>
	                        		<div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-8">
										  <span>Acompañamiento</span>
										  <a href="" data-toggle="modal" data-target="#modalLRFormDemo7">Conoce más</a>
	                        		</div>
	                        	</div>
	                        </div>
	                      </div>
	                      <div class="col-6 col-sm-6 adelanto">
	                        <div class="container_elegirnos">
	                        	<div class="row no-gutters">
	                        		<div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-4">
	                          			<i class="sprite sprite-time-passing"></i>
	                         		</div>
	                        		<div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-8">
										  <span>Adelanto</span>
										  <a href="" data-toggle="modal" data-target="#modalLRFormDemo8">Conoce más</a>
	                        		</div>
	                        	</div>
	                        </div>
	                      </div>
	                    </div>
	                  </div>
	                </div>
	              </div>
	            </div>
	            <div class="col-12 text-center container_scroll">
	              <a href="#overview" class="scroll">
	                <img src="{{ asset('imgs/mouse-scroll.png') }}" class="img-fluid" alt="Mouse Scroll">
	                <span>Scroll Hacia Abajo</span>
	              </a>
	            </div>
	          </div>
	        </div>
	    </section>
	    <section class="panel options" data-section-name="descarga-la-app" style="height:851px;">
	      <img class="img_seccion4 img-fluid" src="{{ asset('imgs/fondo_seccion2.jpg') }}" alt="Fondo Sección Overview">
	      <div class="row no-gutters align-items-center">
	        <div class="container">
	          <div class="col-12 text-center">
	            <h3>¡Próximamente!</h3>
	            <div class="contenedor_dispositivos">
	              <img src="{{ asset('imgs/celular-xisfo-pay.png') }}" class="img-fluid celular_xisfo" alt="Celular APP Xisfo Pay">
	              <img src="{{ asset('imgs/tablet-xisfo-pay.png') }}" class="img-fluid tablet_xisfo" alt="Tablet APP Xisfo Pay">
	            </div>
	          </div>
	        </div>
	      </div>
	      <div class="row no-gutters container_btns_downloads">
	        <div class="col-12 col-sm-6">
	          <img src="{{ asset('imgs/download-google-play.png') }}" class="img-fluid" alt="Google Play Xisfo Pay">
	        </div>
	        <div class="col-12 col-sm-6">
	          <img src="{{ asset('imgs/download-app-store.png') }}" class="img-fluid" alt="App Store Xisfo Pay">
	        </div>
	      </div>
	      <div class="row no-gutters">
	        <div class="col footer text-center">
	          <a href="">Política de Privacidad</a>
	          <span>2019 ©Xisfo Pay - Todos los derechos reservados</span>
	        </div>
	      </div>
	    </section>
	</div>

	<!-- Modal1 -->
    <div class="modal fade" id="modalLRFormDemo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Caso 1</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
                  <div class="col-12 text-center">
                      <h3>“La empresa Webcam LLC tiene su dinero en Bank of América, tiene 100.000 USD”</h3>

                      <p>Webcam LLC realiza la transferencia a nuestra cuenta, una vez confirmada, su dinero es cargado en Xisfo pay y depositado el mismo día en Colombia a la cuenta de Webcam S.A.S. en Bancolombia previamente inscrita y confirmada.</p>

                      <span style="display:block;">Costo</span>

                      <span style="display:block;">100.000 USD – 5% (comisión)= 95.000 USD</span>

                      <span style="display:block;">9.500 * (TRM pagada)</span>
                  </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal2 -->
    <div class="modal fade" id="modalLRFormDemo2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Caso 2</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
                  <div class="col-12 text-center">
                      <h3>“La empresa Webcam S.A.S. tiene su dinero en Paxum, tiene 100.000 USD”</h3>

                      <p>Webcam S.A.S. realiza su transferencia a nuestra cuenta Paxum, una vez confirmada su dinero es cargado y depositado el mismo día en Colombia a la cuenta de Webcam S.A.S. en Bancolombia previamente inscrita y confirmada.</p>

                      <span style="display:block;">En los ejemplos antes mencionados la comisión es la misma, su dinero es entregado o depositado el mismo día a valor neto, sin retenciones, ni descuentos de costos financieros.</span>
                  </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal3 -->
    <div class="modal fade" id="modalLRFormDemo3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Contacto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
                <div class="col-12 text-center">
                    <span><b>Email:</b> soporte@xisfo.com</span>
                </div>
                <div class="col-12 text-center">
                    <span><b>Cel:</b> 300 429 1972</span>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
	</div>

	<!-- Modal4 -->
    <div class="modal fade" id="modalLRFormDemo4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Tipos de Registros</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
                <div class="col-12 text-center">
					<a href="{{ url('/personan') }}" class="links_tuser">
						Persona Natural
					</a>
                </div>
                <div class="col-12 text-center whatsapp_lefemme_s">
                    <a href="{{ url('/personaj') }}" class="links_tuser">
                        Persona Jurídica
                    </a>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
	</div>

	<!-- Modal5 -->
    <div class="modal fade" id="modalLRFormDemo5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Rapidez</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
                <div class="col-12 text-center">
					<p class="parrafo_modal">Recibe tus pagos el mismo día en que se emitan tus facturas, no tendrás que esperar trámites engorrosos y largos periodos para obtenerlos.</p>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
	</div>

	<!-- Modal6 -->
    <div class="modal fade" id="modalLRFormDemo6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Seguridad</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
                <div class="col-12 text-center">
					<p class="parrafo_modal">Xisfo Pay te garantiza obtener tu dinero de forma inmediata y con soportes legales, no dependas de medios irregulares ni poco confiables.</p>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
	</div>

	<!-- Modal7 -->
    <div class="modal fade" id="modalLRFormDemo7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Acompañamiento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
                <div class="col-12 text-center">
					<p class="parrafo_modal">Si tu creces, Xisfo Pay crece contigo, por ello te brindamos asesoría tributaria para que sepas cómo llevar el control de tu dinero sin caer en evasiones.</p>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
	</div>

	<!-- Modal8 -->
    <div class="modal fade" id="modalLRFormDemo8" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Adelanto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
                <div class="col-12 text-center">
					<p class="parrafo_modal">Podrás llegar a obtener el valor de tus facturas antes de que estas hayan sido emitidas en la fecha de corte, accede a ello.</p>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

	<div class="btn_mobile_menu">
      <div class="btn1"><a href="{{ url('/login') }}"><i class="fa fa-user fa-2x"></i></i></a></div>
      <div class="btn2"><a onclick="ScrollTo('configuration')"><i class="fas fa-shield-alt"></i></a></div>
      <div class="btn3"><a onclick="ScrollTo('overview')"><img src="{{ asset('../favicon.png') }}"></a></div>
      <div class="btn4"><a href="{{ url('/') }}"><i class="fas fa-home"></i></a></div>
      <div class="mask2"><i class="fa fa-home fa-2x"></i></div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
	<script src="{{ asset('js/jquery-2.2.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollify.js') }}"></script>
	<script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
