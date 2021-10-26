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
                <h4>TICKETS</h4>
                <span>Listado de Tickets</span>
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
                                        <th>Tipo</th>
                                        <th>Asunto</th>
                                        <th style="text-align: center;">Estado</th>
                                        <th style="text-align: center;">Fecha</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($misTickets as $key => $tk)
                                        <tr>
                                            <td style="text-align: center;">{{ $key+1 }}</td>
                                            <td>{{ $tk->tipoTicket($tk->tipo) }}</td>
                                            <td><a href="/manager/miticket/{{ $tk->codigo }}/ver" >#{{ $tk->codigo }}</a>
                                            <br/>{{ $tk->asunto }}
                                            </td>
                                            @if($tk->estado == 0)
                                                <td style="text-align: center;"><button type="button" class="btn-sm btn-warning">{{ $tk->estado($tk->estado) }}</button></td>
                                            @endif
                                            @if($tk->estado == 1)
                                                <td style="text-align: center;"><button type="button" class="btn-sm btn-info">{{ $tk->estado($tk->estado) }}</button></td>
                                            @endif
                                            @if($tk->estado == 2)
                                                <td style="text-align: center;"><button type="button" class="btn-sm btn-success">{{ $tk->estado($tk->estado) }}</button></td>
                                            @endif

                                            <td style="text-align: center;">{{ $tk->created_at}}</td>
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