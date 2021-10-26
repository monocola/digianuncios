<!DOCTYPE html>
<html lang="en">
@include('layouts.admin.cabecera')

<body class="header-fixed">
<!-- Pre-loader start -->

<!-- Pre-loader end -->
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
        <!-- Page-header start -->
        <div class="page-header">
            <div class="page-header-title">
                <h4>ADMINISTRAR ANUNCIOS</h4>
                <span>Panel de Anuncios Manager</span>
            </div>
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{url('/manager/ManagerAnuncios/nuevo')}}" class="btn btn-secondary">Nuevo Anuncio</a>
                    </li>

                </ul>
            </div>
        </div>
        <!-- Page-header end -->
        <!-- Page-body start -->
        <div class="page-body">
            <form action="/manager/query" method="post" class="form-inline">
                {{ csrf_field() }}
                <div class="form-group mx-sm-3 mb-2">
                    <input type="text" style="width: 400px;" class="form-control" name="query" placeholder="Buscar por código ó correo">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Buscar</button>
            </form>


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
                                        <th>Código</th>
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
                                            <td>{{ $anun->codigo }}</td>
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
                                                <a href="/manager/ManagerAnuncios/{{$anun->id}}/detalle" class="btn btn-sm btn-success"> Ver</a>

                                                <!-- Modal -->
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
                                                                <img src="/anuncios/{{$anun->banner}}">
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
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
@include('layouts.admin.piehome')
</body>
</html>
