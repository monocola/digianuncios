@extends('errors::layout')

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
    <link href="{{ asset('/css/lib.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


    <script src="{{ asset('/code.jquery.com/jquery-1.12.0.min.js') }}"></script>


    <!-- Custom - Common CSS -->

    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

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


    <!-- Menu Block -->
    <div class="container-fluid no-left-padding no-right-padding menu-block">
        <!-- Container -->

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


    <!-- Page Content -->
        <div class="main-container">

            <main class="site-main">

                <!-- Page Content -->
                <div class="container-fluid no-left-padding no-right-padding page-content">
                    <!-- Container -->
                    <div class="container">
                        <div class="row justify-content-md-center">
                            <div class="col-md-8">
                                <div class="error-block">
                                    <span>404</span>
                                    <h2>Oops! La Página no fue encontrada</h2>
                                    <p>Lo sentimos, Es posible que se encuentre en una url no permitida o no existente. </p>
                                    <a href="{{ url('/') }}" title="Volver">Volver a Principal</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- Container /- -->
                </div><!-- Page Content /- -->

            </main>

        </div>


    </main>



</div>

<!-- Footer Main -->
<footer class="container-fluid no-left-padding no-right-padding footer-main">
    <!-- Instagram -->

    <!-- Container -->
    <div class="container">
        <ul class="ftr-social">
            <li><a href="https://www.facebook.com/Digianuncioscom-398086414165622/" target="t_black" title="Facebook"><i class="fab fa-facebook-square"></i>facebook</a></li>
            <li><a href="#" title="Twitter"><i class="fab fa-twitter-square"></i>twitter</a></li>
            <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i>Instagram</a></li>
            <li><a href="#" title="Pinterest"><i class="fab fa-pinterest-square"></i>pinterest</a></li>
            <li><a href="#" title="Youtube"><i class="fab fa-youtube-square"></i>youtube</a></li>
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


<!-- Library - Js -->
<script src="js/popper.min.js"></script>
<script src="js/lib.js"></script>



<!-- Library - Theme JS -->
<script src="js/functions.js"></script>

<script src="select2/select2.full.js"></script>


</body>

</html>