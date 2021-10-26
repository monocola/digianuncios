<!DOCTYPE html>
<html lang="en">
@include('layouts.admin.cabecera')
<body class="header-fixed">
@if (session('notification'))

    <script>
        $( document ).ready(function() {
            $('#default-Modal').modal('toggle')
        });
    </script>
@endif
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
                <h4> NOTIFICACIONES </h4>
                <span>Notificaciones a Usuarios</span>
            </div>
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="/manager/notifications/create" class="btn btn-secondary">Crear Notificación</a>
                    </li>

                </ul>
            </div>

        </div>

        <div class="form-group row">
            <div class="col-sm-10">Selecione Usuario
                <form class="form-inline" method="POST" action="/manager/notifications">
                    @csrf
                    <div class="form-group mx-sm-3 mb-2" style="width: 600px;">
                        <select class="js-example-basic-single col-sm-12" name="usuario_id" required>
                            <option value="" >Seleccione...</option>
                            @foreach ($usuarios as $key => $usu)
                                <option value="{{ $usu->id }}" >{{ $usu->name }} {{ $usu->lastname }} - {{ $usu->email}} [ {{$usu->country}}]</option>

                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary mb-2">Consultar</button>
                </form>
            </div>
        </div>
        @if($notificacionesUser == "ninguno")

        @else

            @if($notificacionesUser->count() == 0)
                <div class="alert alert-warning icons-alert" style="text-align: center;">
                    <p><code>El Usuario no tiene Notificaciones.</code></p>
                </div>
            @endif


            <!-- respuestas -->
                @foreach ($notificacionesUser as  $not)
                    <div class="col-sm-12">
                        <!-- Basic Form Inputs card start -->
                        <div class="card">
                            <div class="card-header">
                                <h5><a href="/manager/notifications/{{ $not->id }}/view"> {{ $not->subject }}</a></strong>
                                </h5>
                                <span>{{ str_limit($not->body ,20)}} </span>
                                <span>{{ $not->created_at->diffForHumans() }}</span>
                                @if($not->state == 0)
                                <span>Estado: <span class="badge badge-warning" style="color:white;font-size: 9px;">Por revisar</span> </span>
                                @endif
                                @if($not->state == 1)
                                    <span>Estado: <span class="badge badge-info" style="color:white;font-size: 9px;">Revisado</span> </span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach

        @endif


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
