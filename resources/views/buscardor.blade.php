<!DOCTYPE html>
<html lang="en">
<head>
    <title>digianuncios.com | Incio</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="ingforgroup eirl">
    <meta name="description" content="@foreach ($categorias as $key => $cat)
    {{ $cat->name }},
	@endforeach"/>
    <meta name="robots" content="index"/>
    <!-- Standard Favicon -->
    <link rel="icon" type="image/png"   href="{{asset('img/favicon.png')}}"  />
    <!-- Library -->
   <!-- flag icon framework css -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/pages/flag-icon/flag-icon.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style4.css')  }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- autocompletado -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

    <script type="text/javascript">
        var path = "{{ route('autocomplete') }}";
        $('input.typeahead').typeahead({
            source:  function (query, process) {
                return $.get(path, { query: query }, function (data) {
                    return process(data);
                });
            }
        });
    </script>


    <script
            src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous">

    </script>
    <!-- Custom - Common CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!--[if lt IE 9]>
    <script src="js/html5/respond.min.js"></script>
    <![endif]-->
    <!-- select2 -->
    <link rel="stylesheet" href="select2/select2.min.css">
    <link rel="stylesheet" href="select2/select2-bootstrap.css">
    <link rel="stylesheet" href="select2/gh-pages.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-151388629-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-151388629-1');
    </script>


    <script language="javascript" type="text/javascript">
        function checkSubmit() {
            document.getElementById("btnShow").hidden = true;
            document.getElementById('btnhidden').style.display = 'block';
            return true;
        }
    </script>
    <script type="text/javascript">
        $('form').submit(function() {
            $(this).find("button[type='submit']").prop('disabled',true);
        });
    </script>

    @if (session('textoAlerta'))
        <script>
            $( document ).ready(function() {
                $('#modalPush').modal('toggle')
            });


            var id = '{{session('anun_id')}}';

            $( document ).ready(function() {
                $('#exampleModalLong-'+id).modal('toggle')
            });
        </script>

    @endif

    @if (session('info'))

        <script>

            var id = '{{session('anun_id')}}';

            $( document ).ready(function() {
                $('#exampleModal-'+id).modal('toggle')
            });

        </script>

    @endif

    <script language="javascript" type="text/javascript">

        $(document).ready(function(){
            $(".pago").click(function(evento){

                var valor = $(this).val();

                if(valor == 'Deposito') {
                    $("#div1").show();
                    $("#div2").hide();
                    $("#div3").hide();
                }if(valor == 'Deposito1'){
                    $("#div1").hide();
                    $("#div2").show();
                    $("#div3").hide();
                }if(valor == 'Deposito2'){
                    $("#div1").hide();
                    $("#div2").hide();
                    $("#div3").show();
                }
            });
        });
    </script>


    <script>
        function validar(frm) {
            frm.sub.disabled = true;
            for (i=0; i<1; i++)
                if (frm['txt'+i].value.length <= 2) return
            frm.sub.disabled = false;
        }
    </script>

    <script language="javascript">
        function activa_boton(campo,boton){
            if (campo.value != "0"){
                boton.disabled=false;
            } else {
                boton.disabled=true;
            }
        }
    </script>

</head>
@if (session('success'))
    <div style="background: #007791;color:white;text-align: center;center;height: 10%;" >
        <p><strong>¡Felicitaciones!</strong> {{ session('success') }} </p>
    </div>
@endif
<body data-offset="200" data-spy="scroll" data-target=".ownavigation">
<div id="app">
    <!-- Header Section -->
    <header class="container-fluid no-left-padding no-right-padding header_s header-fix header_s1">
        <!-- SidePanel -->
        <!-- Menu Block -->
        <div class="container-fluid no-left-padding no-right-padding menu-block">
            <!-- Container -->

        <!-- Container /- -->
        </div><!-- Menu Block /- -->
        <!-- Search Box -->

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

            @include('buscar')
            <br/>
        @if($categories == true)
            @include('categories')
        @else

        @endif
        <!-- Page Content -->
            <div class="container-fluid no-left-padding no-right-padding page-content">
                <!-- Container -->
            @include('anuncios')
            <!-- Container /- -->
            </div>


        </main>

        @include('modal-success')



    </div>

</div>


<!-- Footer Main -->
<footer class="container-fluid no-left-padding no-right-padding footer-main opacity">
    <!-- Instagram -->

    <!-- Container -->
    <div class="container ">
        <ul class="ftr-social">
            <li><a href="https://www.facebook.com/Digianuncioscom-398086414165622/" target="t_black" title="Facebook"><i class="fab fa-facebook-square"></i>facebook</a></li>
            <li><a href="#" title="Twitter"><i class="fab fa-twitter-square" ></i>twitter</a></li>
            <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i>Instagram</a></li>
            <li><a href="#" title="Pinterest"><i class="fab fa-pinterest-square"></i>pinterest</a></li>
            <li><a href="#" title="Youtube"><i class="fab fa-youtube-square"></i>youtube</a></li>
        </ul>


    </div><!-- Container /- -->
</footer><!-- Footer Main /- -->

<!-- JQuery v1.12.4 -->


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