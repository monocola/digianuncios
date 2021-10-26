<!DOCTYPE html>
<html lang="en">
@include('layouts.admin.cabecera')
@if (session('notification'))

    <script>
        $( document ).ready(function() {
            $('#default-Modal').modal('toggle')
        });
    </script>
@endif
<body class="header-fixed">

<!-- Menu header start -->
@include('admin.menus.menu')
<!-- Menu header end -->
<!-- Menu aside start -->
@include('layouts.admin.menu-vertical')
<!-- Menu aside end -->
<!-- Sidebar chat start -->

<!-- Sidebar inner chat start-->

<!-- Sidebar inner chat end-->
<!-- Main-body start -->
<div class="main-body">
    <div class="page-wrapper">
        <!-- Page header start -->
        <div class="page-header">
            <div class="page-header-title">
                <h4>CREAR NOTIFICACIÓN</h4>
                <span>Administrador del Portal</span>
            </div>
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.html">
                            <i class="icofont icofont-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{url('/misAnuncios')}}">Mis Anuncios</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Abrir Ticket</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Page header end -->
        <!-- Page body start -->
        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Basic Form Inputs card start -->
                    <div class="card">
                        <div class="card-header">
                            <h5>Nueva Notificación</h5>
                            <span></span>

                        </div>
                        <div class="card-block">


                            <div class="row">
                                <div class="col-sm-12">
                                    @if ($errors->any())
                                        <div class="alert alert-danger icons-alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <i class="icofont icofont-close-line-circled"></i>
                                            </button>

                                            Error<br/>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach

                                        </div>
                                    @endif



                                    @if (session('notification1'))

                                        <div class="alert alert-danger icons-alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <i class="icofont icofont-close-line-circled"></i>
                                            </button>

                                            Error<br/>

                                            <li>{{ session('notification1') }}</li>
                                        </div>

                                    @endif

                                    @if (session('notification2'))

                                        <div class="alert alert-danger icons-alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <i class="icofont icofont-close-line-circled"></i>
                                            </button>

                                            Error<br/>

                                            <li>{{ session('notification2') }}</li>
                                        </div>

                                    @endif



                                    <form method="POST" action="/manager/notification" onsubmit="return checkSubmit();" >
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-sm-12">Selecione Usuario
                                                <select class="js-example-basic-single col-sm-12" required name="usuario_id">
                                                    <option value="" >Seleccione...</option>
                                                    @foreach ($usuarios as $key => $usu)
                                                        <option value="{{ $usu->id }}" >{{ $usu->name }} {{ $usu->lastname }} - {{ $usu->email}} [ {{$usu->country}}]</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12">Asunto
                                                <input type="text" required name="asunto" class="form-control " style="width: 100%;" value="{{ old('asunto') }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-12">Mensaje
                                                <textarea type="text" required name="mensaje" class="form-control " style="width: 100%;height: 200px;">{{ old('mensaje') }}</textarea>
                                            </div>
                                        </div>



                                        <div class="row" style="text-align: right;" id="btnShow">
                                            <label class="col-sm-12"></label>
                                            <div class="col-sm-12">
                                                <input type="submit" class="btn btn-success m-b-0" value="Enviar" name="btTutorial">
                                                <a href="{{ url('/manager/notifications') }}" class="btn btn-outline-warning m-b-0">Volver</a>
                                            </div>
                                        </div>

                                        <div style="display: none;" class="text-right" id="btnhidden">
                                            <label class="col-sm-12"></label>
                                            <div class="col-sm-12">
                                                <button type="submit" disabled=""  class="btn btn-success m-b-0">Enviando...</button>
                                                <a href="{{ url('/manager/notifications') }}" class="btn btn-outline-warning m-b-0">Volver</a>
                                            </div>
                                        </div>




                                    </form>
                                </div>





                                <!-- Modal static-->
                                <div class="modal fade" id="default-Modal" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Éxito</h4>

                                            </div>
                                            <div class="modal-body">
                                                <div style="text-align: center;" ><img src="/img/success.png" width="100px" height="100px">
                                                    <p></p>
                                                    <span class="center" style="width: 10px;">{{ session('notification') }}</span>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                            </div>

                        </div>
                    </div>
                </div>
                <!-- Basic Form Inputs card end -->
                <!-- Input Grid card start -->

                <!-- Input Grid card end -->
                <!-- Input Validation card start -->

                <!-- Input Validation card end -->
                <!-- Input Alignment card start -->
                <!-- Input Alignment card end -->
            </div>
        </div>
    </div>
    <!-- Page body end -->
</div>
</div>
@include('copyright.footer')
@include('layouts.admin.piehome')

</body>
</html>
