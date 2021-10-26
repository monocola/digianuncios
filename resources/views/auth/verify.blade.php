<!DOCTYPE html>
<html lang="en">
@include('layouts.admin.cabecera')
<!-- Pre-loader start -->
<!-- Pre-loader end -->
<!-- Menu header start -->
@include('auth.layout.menu')
<!-- Menu header end -->
<!-- Menu aside start -->
@include('layouts.admin.vertical')
<!-- Menu aside end -->
<!-- Sidebar chat start -->
@if (session('resent'))
    <div style="background: #007791;color:white;text-align: center;center;height: 10%;" >
        <strong>Éxito!</strong> {{ __('Hemos enviado un correo a su bandeja, le recomendamos revisar también en spam.') }}
    </div>
@endif
<!-- Sidebar inner chat start-->

<!-- Sidebar inner chat end-->
<!-- Main-body start -->

<div class="main-body">
    <div class="page-wrapper">
<div style="height: 100px;"></div>
        <!-- Page-body start -->
        <div class="page-body">
            <div class="row" style="justify-content: center;">
                <div class="col-sm-7">
                    <!-- Zero config.table start -->
                    <div class="card">
                        <div class="card-block">
                            <div class="dt-responsive table-responsive">
                                <div class="card-body">
                                   <div style="text-align: justify;">
                                       Estimado {{ Auth::user()->name }},<br/><br/>
                                       Bienvenido a digianuncios, gracias por desear anunciar con nosotros, la seguridad de nuestros anunciantes nos
                                       la tomamos muy enserio, es por ello que antes de continuar necesitamos que verifique su correo, el cual ha sido enviado a
                                           {{Auth::user()->email}}.
                                       <p></p>
                                       <p><strong>Importante: </strong> Es posible que el correo enviado se encuente en su bandeja de spam.</p>
                                   </div>

                                   <div>
                                       <a href="{{ route('verification.resend') }}" style="width: 100%;" class="btn btn-sm btn-secondary"><i class="ti-email"></i> No he recibido ningun correo, enviar Nuevamente.</a>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page-body end -->
    </div>
</div>


<body class="header-fixed">
<div class="main-body">
    <div class="page-wrapper">




    </div>
</div>
</body>
</html>

