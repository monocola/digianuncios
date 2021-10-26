<!DOCTYPE html>
<html lang="en">
@include('layouts.admin.cabecera')

@if (session('success'))
    <script>
        $( document ).ready(function() {
            $('#default-Modal').modal('toggle')
        });
    </script>
@endif

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
                <h4>ANALISIS DE CONSULTAS DE ANUNCIOS</h4>
                <span>Análisis de Datos</span>
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
                                        <th style="text-align: center;">Propietario</th>
                                        <th>Nombre Anuncio</th>
                                        <th style="text-align: center;">Nº de Consultas</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($count as $key => $tk)
                                        <tr>
                                            <td style="text-align: center;"> <a  style="color:white;" data-toggle="modal" data-target="#exampleModal-{{$tk->user_propietary}}" href="#"><img  height="20px;" width="20px;" src="/avatars/{{$tk->avatar}}"></a></td>
                                            <td> {{ $tk->titulo }}

                                            <!-- Modal -->
                                                <div class="modal fade bd-example-modal-lg" id="exampleModal-{{$tk->user_propietary}}" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"><i class="fas fa-user-tag"></i> PROPIETARIO DEL ANUNCIO</h5>

                                                            </div>
                                                            <div class="modal-body">
                                                                <table class="table table-bordered table-responsive">
                                                                    <tbody>
                                                                    <tr>
                                                                        <th>CLIENTE:</th>
                                                                        <td  style="width: 100%;">{{ $tk->name }} {{ $tk->lastname }} <i class="flag-icon flag-icon-{{ $tk->country}} m-r-5"></i>{{ strtoupper($tk->country)}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th><strong>TELÉFONO:</strong></th>
                                                                        <td>{{ $tk->phone }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>CUMPLEAÑOS:</strong></td>
                                                                        <td>{{ $tk->birthdate }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th><strong>CORREO:</strong></th>
                                                                        <td>{{ $tk->email }}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th><strong>NIVEL:</strong></th>
                                                                        <td>
                                                                            @if($tk->level == 0 )
                                                                                Anunciante Principiante - BRONCE
                                                                            @elseif($tk->level == 1 )
                                                                                Anunciante Competente - PLATA
                                                                            @elseif($tk->level == 2 )
                                                                                Anunciante Destacado - ORO
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><strong>CREADO:</strong></td>
                                                                        <td>{{ $tk->created_at }}</td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>




                                            </td>
                                            <td style="text-align: center;">
                                                @if($tk->num < 50 )
                                                    <span style="color:white" class="badge badge-danger">{{ $tk->num }}</span>
                                                @endif
                                                @if($tk->num > 51 && $tk->num < 99 )
                                                    <span style="color:white" class="badge badge-warning">{{ $tk->num }}</span>
                                                @endif
                                                @if($tk->num > 100)
                                                    <span style="color:white" class="badge badge-success">{{ $tk->num }}</span>
                                                @endif

                                            </td>
                                        </tr>



                                    @endforeach
                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>

                                {{ $misTickets->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page-body end -->
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sugerir Categoría</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="/admin/categoria" onsubmit="return checkSubmit();">
                {{ csrf_field() }}
                <div class="modal-body">
                    <span>Usted puede solicitar agregar a digianuncios.com la categoría que necesita.</span>
                    <p></p>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input placeholder="Categoría" type="text" name="sug_categoria" class="form-control" required style="width: 100%;">
                            <input type="hidden" name="descripcion" value="Categoría sugerida">
                        </div>

                    </div>
                </div>
                <div class="modal-footer" id="btnShow">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Sugerir</button>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- modal success -->
<div class="modal fade" id="default-Modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Éxito</h4>

            </div>
            <div class="modal-body">
                <div style="text-align: center;" ><img src="/img/success.png" width="100px" height="100px">
                    <p></p>
                    <span class="center" style="width: 10px;">{{session('success')}}</span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>
@include('copyright.footer')
@include('layouts.admin.piehome')
</body>