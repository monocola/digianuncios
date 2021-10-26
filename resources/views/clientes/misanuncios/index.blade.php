<!DOCTYPE html>
<html lang="en">
@include('layouts.admin.cabecera')
@if (session('notification'))
    <script>
        $( document ).ready(function() {
            $('#default-success').modal('toggle')
        });
    </script>
@endif
@if (session('notification2'))
    <script>
        $( document ).ready(function() {
            $('#default-error').modal('toggle')
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

<!-- Sidebar inner chat start-->

<!-- Sidebar inner chat end-->
<!-- Main-body start -->
<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="page-header-title">
                <h4>MIS ANUNCIOS</h4>
                <span>Panel de Anuncios</span>
            </div>
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{url('/admin/misAnuncios/nuevo')}}" class="btn btn-secondary">Nuevo Anuncio</a>
                    </li>

                </ul>
            </div>
        </div>
        <!-- Page-header end -->
        <!-- Page-body start -->
        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Zero config.table start -->
                    <div class="card">

                        <div class="card-block">
                            <div class="dt-responsive table-responsive">
                                <table id="simpletable" class="table table-striped table-bordered nowrap">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center;">Nº</th>
                                        <th>Título</th>
                                        <th>Teléfono</th>
                                        <th>Sitio Web</th>
                                        <th>Correo</th>
                                        <th style="text-align: center;">Estatus</th>
                                        <th>Creado</th>
                                        <th style="text-align: center;">Anuncio</th>
                                        <th style="text-align: center;">Administrar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($anuncios as $key => $anun)
                                        <tr>
                                            <td style="text-align: center;">{{ $key+1 }}</td>
                                            <td>{{ $anun->titulo }}</td>
                                            <td>{{ $anun->telefono }}</td>
                                            <td>{{ $anun->sitioweb }}</td>
                                            <td>{{ $anun->correo }}</td>
                                            <td style="text-align: center;">
                                                @if($anun->estado == 0)
                                                    <span class="badge badge-warning">{{$anun->estado($anun->estado)}}</span>
                                                @elseif($anun->estado == 1)
                                                    <span class="badge badge-success">{{$anun->estado($anun->estado)}}</span>
                                                @elseif($anun->estado == 2)
                                                    <span class="badge badge-danger">{{$anun->estado($anun->estado)}}</span>
                                                @endif

                                            </td>
                                            <td>{{ $anun->created_at }}</td>
                                            <td style="text-align: center;"><img data-toggle="modal" data-target="#exampleModal-{{$anun->id}}" height="40px;" width="40px;" src="/anuncios/{{$anun->banner}}"></td>
                                            <td style="text-align: center;">
                                                <div class="dropdown-primary dropdown open">
                                                    <button class="btn btn-primary dropdown-toggle waves-effect waves-light btn-mini " type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Opciones</button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                                        <a class="dropdown-item waves-light waves-effect" href="/admin/AdminAnuncio/{{$anun->id}}/detalle">Detalles</a>
                                                        <a class="dropdown-item waves-light waves-effect" href="/admin/AdminAnuncio/{{$anun->id}}/edit">Modificar</a>
                                                        <a onclick="return confirm('¿Está seguro que desea Eliminar el anuncio? ')" class="dropdown-item waves-light waves-effect" href="/admin/AdminAnuncio/{{$anun->id}}/eliminar">Eliminar</a>
                                                    </div>
                                                </div>

                                                <!-- Modal banner imagen -->
                                                <div class="modal fade" id="exampleModal-{{$anun->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">{{$anun->titulo}}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div style="text-align:center;" class="modal-body">
                                                                <img style="width: 800px;height: 1000px;" src="/anuncios/{{$anun->banner}}">
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <!-- modal success -->
                                    <div class="modal fade" id="default-success" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Éxito</h4>

                                                </div>
                                                <div class="modal-body">
                                                    <div style="text-align: center;" ><img src="/img/success.png" width="100px" height="100px">
                                                        <p></p>
                                                        <span class="center" style="width: 10px;">{{  session('notification') }}</span>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page body start -->
                                    <!-- modal success -->
                                    <div class="modal fade" id="default-error" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Acceso Denegado</h4>

                                                </div>
                                                <div class="modal-body">
                                                    <div style="text-align: center;" ><img src="/img/error.png" width="100px" height="100px">
                                                        <p></p>
                                                        <span class="center" style="width: 10px;">{{  session('notification2') }}</span>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page body start -->
                                    <tfoot>

                                    </tfoot>
                                </table>

                                {{ $anuncios->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page-body end -->
    </div>
</div>
@include('copyright.footer')

</body>
</html>
