
<!DOCTYPE html>
<html lang="es">
<head>
    <title>digianuncios.com | Acceso</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Phoenixcoded">
    <meta name="keywords" content=", Flat ui, Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="Phoenixcoded">
    <!-- Favicon icon -->

    <link rel="icon" type="image/png"   href="{{asset('img/favicon.png')}}"  />
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/themify-icons/themify-icons.css') }}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/icofont/css/icofont.css') }}">
    <!-- Style.css -->

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style3.css')  }}">

    <!--color css-->

</head>
@if ($errors->any())
    <div style="background: #e74c3c;color:white;text-align: center;center;height: 10%;">
        @foreach ($errors->all() as $error)
            <strong>Ups!</strong> {{ $error }}
        @endforeach
    </div>
@endif
@if (session('status'))
    <div style="background: #007791;color:white;text-align: center;height: 10%;">
        <strong>Éxito!</strong> {{ session('status') }}, Es posible que se encuentre en su bandeja de spam.
    </div>
@endif
<body class="multi-step-sign-up backgr-img-bg">

<section class="login p-fixed d-flex text-center bg-primary common-img-bg">
    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <!-- Authentication card start -->
                <div class="login-card card-block auth-body">
                    <form class="md-float-material" method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="text-center">
                            <a href="{{ url('/') }}" ><img src="{{asset('img/logo-digianuncios-negro.png')}}" alt="logo.png"></a>
                        </div>
                        <div class="auth-box">

                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h4 style="color:black;">Olvidé mi Clave </h4>
                                </div>
                            </div>
                            <p class="text-inverse b-b-default text-right">volver a <a href="{{ url('/login')  }}">Acceso.</a></p>
                            <div class="input-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Ingrese su correo">
                                <span class="md-line"></span>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Enviar correo para cambiar clave</button>
                                </div>

                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-10">
                                    <p class="text-inverse text-left m-b-0">Gracias por elegirnos.</p>
                                    <p class="text-inverse text-left"><b>Su equipo está trabajando para usted.</b></p>
                                </div>
                                <div class="col-md-2">
                                    <img style="width: 30px;" src="{{asset('img/logo.png')}}" alt="small-logo.png">
                                </div>
                            </div>

                        </div>
                    </form>
                    <!-- end of form -->
                </div>
                <!-- Authentication card end -->
            </div>
            <!-- end of col-sm-12 -->
        </div>
        <!-- end of row -->
    </div>
    <!-- end of container-fluid -->
</section>
<!-- Warning Section Starts -->
<!-- Older IE warning message -->
<!--[if lt IE 9]>

<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="bower_components/tether/dist/js/tether.min.js"></script>
<script type="text/javascript" src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="bower_components/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="bower_components/modernizr/modernizr.js"></script>
<script type="text/javascript" src="bower_components/modernizr/feature-detects/css-scrollbars.js"></script>
<!-- i18next.min.js -->
<script type="text/javascript" src="bower_components/i18next/i18next.min.js"></script>
<script type="text/javascript" src="bower_components/i18next-xhr-backend/i18nextXHRBackend.min.js"></script>
<script type="text/javascript" src="bower_components/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js"></script>
<script type="text/javascript" src="bower_components/jquery-i18next/jquery-i18next.min.js"></script>
<!-- Custom js -->
<script type="text/javascript" src="assets/js/script.js"></script>
<!--color js-->

</body>
</html>


