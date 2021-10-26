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
                <h4>CONSULTAS DEL USUARIO</h4>
                <span>Administración de consultas</span>
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
                                        <th>Categoría</th>
                                        <th>Ubicación</th>
                                        <th style="text-align: center;">Ip</th>
                                        <th style="text-align: center;">Creado</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($consults as $key => $cs)
                                        <tr>
                                            <td style="text-align: center;">{{ $key+1 }}</td>
                                            @if($cs->categoria_id == 0)
                                                <td>--No consultado--</td>
                                            @else
                                                <td>{{ $cs->categorias->nombre }}</td>
                                            @endif

                                            <td>{{ $cs->location($cs->location) }}</td>
                                            <td style="text-align: center;">{{ $cs->ip }}</td>
                                            <td style="text-align: center;">{{ $cs->created_at }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>

                                {{ $consults->links() }}
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
