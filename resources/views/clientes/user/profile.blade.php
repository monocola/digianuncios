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

@if (session('notificationerror'))
    <script>
        $( document ).ready(function() {
            $('#default-Modal1').modal('toggle')
        });
    </script>
@endif

<body class="header-fixed">
<!-- Pre-loader start -->

<!-- Pre-loader end -->
<!-- Menu header start -->
@include('layouts.admin.menu')
<!-- Menu header end -->
<!-- Menu aside start -->
@include('layouts.admin.vertical')
<!-- Menu aside end -->
<!-- Sidebar chat start -->


<div class="main-body user-profile">
    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="page-header-title">
                <h4>MI PERFIL</h4>
            </div>
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.html">
                            <i class="icofont icofont-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Admin</a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Perfil de Usuario</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Page-header end -->
        <!-- Page-body start -->
        <div class="page-body">
            <!--profile cover start-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="cover-profile">
                        <div class="profile-bg-img">
                            <img class="profile-bg-img img-fluid"  src="{{ asset('assets/images/user-profile/bg-img1.jpg') }}" alt="bg-img">
                            <div class="card-block user-info">
                                <div class="col-md-12">
                                    <div class="media-left">
                                        <a href="#" data-toggle="modal" data-target="#exampleModal" class="profile-image">
                                            <img class="user-img img-circle" style="width: 120px;height: 120px;" src="/avatars/{{Auth::user()->avatar}}" alt="user-img">
                                        </a>
                                    </div>
                                    <div class="media-body row">
                                        <div class="col-lg-12">
                                            <div class="user-title">
                                                <h2>{{ Auth::user()->name }} {{ Auth::user()->lastname }}</h2>
                                                <span class="text-white">Anunciante destacado</span>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="pull-right cover-btn">
                                                <a href="{{ url('/home') }}" class="btn btn-sm btn-primary"><i class="icofont icofont-ui-view"></i> PANEL DE ANUNCIOS</a>
                                                <a href="{{ url('/admin/misAnuncios') }}" class="btn btn-sm btn-primary"><i class="icofont icofont-ui-view"></i> VER MIS ANUNCIOS</a>
                                                <a style="color:white;" data-toggle="modal" data-target="#changepass" class="btn btn-sm btn-danger"><i class="icofont icofont-ui-view"></i> CAMBIAR CLAVE</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal success-->
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

            <!-- Modal error-->
            <div class="modal fade" id="default-Modal1" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Ups!</h4>

                        </div>
                        <div class="modal-body">
                            <div style="text-align: center;" ><img src="/img/errorsad.png" width="100px" height="100px">
                                <p></p>
                                <span class="center" style="width: 10px;">{{ session('notificationerror') }}</span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal avatar-->
            <form method="POST" action="" enctype="multipart/form-data" onsubmit="return checkSubmit();" >
                {{ csrf_field() }}
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Foto de Perfil</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="file" name="file" class="form-control" required style="width: 100%;">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Cambiar Imagen</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <!--profile cover end-->

            <!--profile change password-->
            <form method="POST" action="/admin/my-profile/pass" >
                {{ csrf_field() }}
                <div class="modal fade" id="changepass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Cambiar Clave</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">Ingrese Clave Actual
                                <input type="text" name="passold" class="form-control" style="width: 100%;" required>
                            </div>
                            <div class="modal-body">Ingrese Nueva Clave
                                <input type="text" name="pass" class="form-control" style="width: 100%;" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Cambiar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>



            <div class="row">
                <div class="col-lg-12">
                    <!-- tab header start -->
                    <div class="tab-header">
                        <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#personal" role="tab">Mi Información Personal</a>
                                <div class="slide"></div>
                            </li>
                        </ul>
                    </div>
                    <!-- tab header end -->
                    <!-- tab content start -->
                    <div class="tab-content">
                        <!-- tab panel personal start -->
                        <div class="tab-pane active" id="personal" role="tabpanel">
                            <!-- personal card start -->
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-header-text">Acerca de Mí</h5>

                                </div>
                                <div class="card-block">
                                    <div class="view-info">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="general-info">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-xl-6">
                                                            <table class="table m-0">
                                                                <tbody>
                                                                <tr>
                                                                    <th scope="row">Nombres</th>
                                                                    <td>{{ Auth::user()->name }} {{ Auth::user()->lastname }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Pais</th>
                                                                    <td>{{ Auth::user()->country }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Fecha de Nacimiento</th>
                                                                    <td>{{ Auth::user()->birthdate }} </td>
                                                                </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- end of table col-lg-6 -->
                                                        <div class="col-lg-12 col-xl-6">
                                                            <table class="table">
                                                                <tbody>
                                                                <tr>
                                                                    <th scope="row">Correo</th>
                                                                    <td><a href="#!">{{ Auth::user()->email }} </a></td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Teléfono</th>
                                                                    <td>{{ Auth::user()->phone }} </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">Creado el </th>
                                                                    <td>{{ Auth::user()->created_at }} </td>
                                                                </tr>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <!-- end of table col-lg-6 -->
                                                    </div>
                                                    <!-- end of row -->
                                                </div>
                                                <!-- end of general info -->
                                            </div>
                                            <!-- end of col-lg-12 -->
                                        </div>
                                        <!-- end of row -->
                                    </div>

                                </div>
                                <!-- end of card-block -->
                            </div>

                            <!-- personal card end-->
                        </div>
                        <!-- tab pane personal end -->
                        <!-- tab pane info start -->

                        <!-- tab pane info end -->

                    </div>
                    <!-- tab content end -->
                </div>
            </div>
        </div>
        <!-- Page-body end -->
    </div>
</div>
<!-- Main body end -->
@include('copyright.footer')
</body>

</html>
