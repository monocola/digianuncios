<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>digianuncios.com</title>

    <!-- Standard Favicon -->
    <link rel="icon" type="image/x-icon" href="http://atixscripts.info/demo/html/minimag/assets/images//favicon.ico" />


    <!-- Library -->
    <link href="css/lib.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">



    <!-- Custom - Common CSS -->

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!--[if lt IE 9]>
    <script src="js/html5/respond.min.js"></script>
    <![endif]-->

    <!-- select2 -->
    <link rel="stylesheet" href="select2/select2.min.css">
    <link rel="stylesheet" href="select2/select2-bootstrap.css">
    <link rel="stylesheet" href="select2/gh-pages.css">



</head>

<body data-offset="200" data-spy="scroll" data-target=".ownavigation">


<!-- Header Section -->
<header class="container-fluid no-left-padding no-right-padding header_s header-fix header_s1">

    <!-- SidePanel -->
    @if (session('textoAlerta'))
        <script>
            $( document ).ready(function() {
                $('#modalPush').modal('toggle')
            });


            var id = '{{session('anun_id')}}';

            $( document ).ready(function() {
                $('#exampleModalScrollable-'+id).modal('toggle')
            });
        </script>

@endif

<!-- Menu Block -->
    <div class="container-fluid no-left-padding no-right-padding menu-block">
        <!-- Container -->
        <div class="container">
            <nav class="navbar ownavigation navbar-expand-lg">
                <a class="navbar-brand" href="http://atixscripts.info/demo/html/minimag/index.html">minimag</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                        data-target="#navbar1" aria-controls="navbar1" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbar1">
                    <ul class="navbar-nav">
                        <li class="dropdown">

                            <a class="nav-link" title="Home"
                               href="#">Inicio</a>

                        </li>
                        <li class="dropdown">

                            <a class="nav-link " title="Posts" href="#">Anuncia con Nosotros</a>

                        </li>

                        <li><a class="nav-link" title="Features" href="#">Quienes Somos</a></li>
                        <li><a class="nav-link" title="Archives" href="#">Preguntas</a></li>
                        <li><a class="nav-link" title="Archives" href="#">Precios</a></li>
                        @guest
                            <li><a class="nav-link" title="Contact"
                                   href="{{url('login')}}">Iniciar Sessión</a>

                            </li>
                        @else
                            @if(Auth::user()->tipo == 1)
                                <li><a class="nav-link"
                                       href="{{ route('logout') }}" onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();"><strong>Cerrar Sessión</strong></a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @else
                                <li><a class="nav-link" title="Contact"
                                       href="{{url('home')}}"><strong>ADMINISTRAR MIS ANUNCIOS</strong></a>
                                </li>

                            @endif
                        @endguest
                    </ul>
                </div>
                <div id="loginpanel-1" class="desktop-hide">
                    <div class="right toggle" id="toggle-1">
                        <a id="slideit-1" class="slideit" href="#slidepanel"><i
                                    class="fo-icons fa fa-inbox"></i></a>
                        <a id="closeit-1" class="closeit" href="#slidepanel"><i
                                    class="fo-icons fa fa-close"></i></a>
                    </div>
                </div>
            </nav>
        </div><!-- Container /- -->
    </div><!-- Menu Block /- -->
    <!-- Search Box -->
    <div class="search-box collapse" id="search-box">
        <div class="container">
            <form>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search..." required>
                    <span class="input-group-btn">
							<button class="btn btn-secondary" type="submit"><i class="pe-7s-search"></i></button>
						</span>
                </div>
            </form>
        </div>
    </div><!-- Search Box /- -->
</header><!-- Header Section /- -->
<div class="clearfix"></div>

<div class="main-container">

    <main class="site-main">

        <!-- Slider Section -->
        <div class="container-fluid no-left-padding no-right-padding slider-section">
            <div id="mm-slider-1_wrapper" class="rev_slider_wrapper fullwidthbanner-container"
                 data-alias="mm-slider-1" data-source="gallery">
                <!-- START REVOLUTION SLIDER 5.4.1 fullwidth mode -->

            </div><!-- END REVOLUTION SLIDER -->
        </div><!-- Slider Section /- -->
        </br>

        <div class="container" style="background: #FAFAFA;">
            </br>
            <form>
                <div class="row">
                    <div class="col-sm-6">
                        <select class="form-control select2-single">
                            <option></option>
                            @foreach ($categorias as $key => $cat)
                                <option value="{{ $cat->id }}">{{ $cat->nombre }}</option>
                            @endforeach
                        </select>
                        <small id="emailHelp" class="form-text text-muted"><input type="checkbox"> Filtrar solo en Peú.&nbsp; &nbsp;  <input type="checkbox"> Filtrar solo aquellos que tengan comentarios.</small>
                    </div>
                    <div class="col-sm-4">
                        <select class="form-control select2-single1">
                            <option></option>
                            @foreach ($categorias as $key => $cat)
                                <option value="{{ $cat->id }}">{{ $cat->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <button style="margin-left: -20px;" type="submit" class="btn btn-sm btn-info mb-2"><i class="fas fa-binoculars"></i> Consultar</button>
                    </div>

                </div>

            </form>




            <div class="col-sm-5">
                </br>


            </div>

        </div>

        <!-- Page Content -->
        <div class="container-fluid no-left-padding no-right-padding page-content">
            <!-- Container -->
            <div class="container">
                <div class="row">
                    <div class="content-area col-sm-12">
                        <!-- Row -->
                        <div class="row blog-masonry-list">





                            @foreach ($anuncios as $key => $anun)
                                @if($anun->sitioweb == null)
                                    <div class="col-lg-4 col-sm-6 blog-masonry-box">
                                        <div class="type-post">
                                            <div class="entry-cover">
                                                <div class="post-meta">
                                                    <span style="font-size: 10px;" class="byline"><a  title="Indesign"><strong><i class="fas fa-home"></i> {{$anun->titulo}}</strong></a></span>
                                                    <span style="font-size: 10px;margin-left: 25%;" class="post-date"><a data-toggle="modal" data-target="#exampleModal1-{{$anun->id}}" href="#"><i class="fas fa-comments"></i> 200</a></span>
                                                    <span style="font-size: 10px;" class="post-date"><a data-toggle="modal" data-target="#exampleModal-{{$anun->id}}" href="#"><i class="fas fa-info-circle"></i> info</a></span>
                                                </div>
                                                <a><img href="#"  src="anuncios/{{$anun->banner}}" alt="Post" /></a>
                                            </div>

                                        </div>
                                    </div>
                                @else
                                    <div class="col-lg-4 col-sm-6 blog-masonry-box">
                                        <div class="type-post">
                                            <div class="entry-cover">
                                                <div class="post-meta">
                                                    <span style="font-size: 10px;" class="byline"><a  title="Indesign"><strong><i class="fas fa-home"></i> {{$anun->titulo}}</strong></a></span>
                                                    <span style="font-size: 10px;margin-left: 25%;" class="post-date"><a data-toggle="modal" data-target="#exampleModalScrollable-{{$anun->id}}" href="#"><i class="fas fa-comments"></i> {{$anun->comentarios_count }}</a></span>
                                                    <span style="font-size: 10px;" class="post-date"><a data-toggle="modal" data-target="#exampleModal-{{$anun->id}}" href="#"><i class="fas fa-info-circle"></i> info</a></span>
                                                </div>
                                                <a target="_blank" href="http://{{$anun->sitioweb}}"><img  src="anuncios/{{$anun->banner}}" alt="Post" /></a>
                                            </div>

                                        </div>
                                    </div>
                                    @include('modal-detalle')
                                    @include('modal-comentarios')

                                @endif


                            @endforeach



                        </div><!-- Row /- -->
                        <!-- Pagination -->
                        <nav class="navigation pagination">
                            <h2 class="screen-reader-text">Posts navigation</h2>
                            <div class="nav-links">
                                {{ $anuncios->links() }}
                            </div>
                        </nav><!-- Pagination /- -->
                    </div>
                </div>
            </div><!-- Container /- -->
        </div><!-- Page Content /- -->

    </main>

    @include('modal-success')

</div>

<!-- Footer Main -->
<footer class="container-fluid no-left-padding no-right-padding footer-main">
    <!-- Instagram -->

    <!-- Container -->
    <div class="container">
        <ul class="ftr-social">
            <li><a href="#" title="Facebook"><i class="fa fa-facebook"></i>facebook</a></li>
            <li><a href="#" title="Twitter"><i class="fa fa-twitter"></i>twitter</a></li>
            <li><a href="#" title="Instagram"><i class="fa fa-instagram"></i>Instagram</a></li>
            <li><a href="#" title="Pinterest"><i class="fa fa-pinterest-p"></i>pinterest</a></li>
            <li><a href="#" title="Youtube"><i class="fa fa-youtube"></i>youtube</a></li>
        </ul>
        <div class="copyright">
            <p><a href="#" style="text-decoration:none;color:#BDBDBD;"> <i class="fas fa-book-reader"></i> Términos y Condiciones</a>&nbsp; &nbsp;
                <a href="#" style="text-decoration:none;color:#BDBDBD;"> <i class="fas fa-book"></i> Libro de Reclamaciones</a>&nbsp; &nbsp;
                <a href="#" style="text-decoration:none;color:#BDBDBD;"> <i class="fas fa-book-open"></i> Política de Privacidad</a>&nbsp; &nbsp;
                <a  style="text-decoration:none;color:#BDBDBD;"> <i class="fas fa-envelope"></i> comercial@digianuncios.com </a>&nbsp; &nbsp;
                <a  style="text-decoration:none;color:#BDBDBD;"> <i class="fas fa-envelope"></i> marketing@digianuncios.com</a>&nbsp; &nbsp;
            </p>
            <p style="text-decoration:none;color:#BDBDBD;"> © 2019 Ingforgroup. Todos los derechos reservados. RUC 20605017178 </p>
        </div>

    </div><!-- Container /- -->
</footer><!-- Footer Main /- -->

<!-- JQuery v1.12.4 -->
<script src="js/jquery-1.12.4.min.js"></script>

<!-- Library - Js -->
<script src="js/popper.min.js"></script>
<script src="js/lib.js"></script>



<!-- Library - Theme JS -->
<script src="js/functions.js"></script>

<script src="select2/select2.full.js"></script>


<script src="select2/anchor.min.js"></script>
<script>
    anchors.options.placement = 'left';
    anchors.add('.container h1, .container h2, .container h3, .container h4, .container h5');

    // Set the "bootstrap" theme as the default theme for all Select2
    // widgets.
    //
    // @see https://github.com/select2/select2/issues/2927
    $.fn.select2.defaults.set( "theme", "bootstrap" );

    var placeholder = "Estoy buscando...";

    $( ".select2-single, .select2-multiple" ).select2( {
        placeholder: placeholder,
        width: null,
        containerCssClass: ':all:',
    } );


</script>

<script>
    anchors.options.placement = 'left';
    anchors.add('.container1');

    // Set the "bootstrap" theme as the default theme for all Select2
    // widgets.
    //
    // @see https://github.com/select2/select2/issues/2927
    $.fn.select2.defaults.set( "theme", "bootstrap" );

    var placeholder = "En la Ubicación... ";

    $( ".select2-single1" ).select2( {
        placeholder: placeholder,
        width: null,
        containerCssClass: ':all:'
    } );


</script>
</body>

</html>