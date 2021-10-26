
<!DOCTYPE html>
<html lang="en">
@include('layouts.admin.cabecera')

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
<div id="sidebar" class="users p-chat-user showChat">
    <div class="had-container">

    </div>
</div>

<!-- Main-body start -->
<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="page-header-title">
                <h4>VISITAS AL SITIO WEB DEL ANUNCIO</h4>
                <span>Administración de Anuncios</span>
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
                            <table class="table table-bordered">
                                @foreach ($anuncio as $key => $anun)
                                    <tbody>
                                    <tr>
                                        <th>CÓDIGO DEL ANUNCIO: </th>
                                        <td>{{ $anun->codigo }}</td>
                                        <td><strong>TÍTULO:</strong> </td>
                                        <td colspan="2">{{ $anun->titulo }}</td>
                                        <td STYLE="text-align: center;" rowspan="2"><img  height="120px;" width="120px;" src="/anuncios/{{$anun->banner}}"></td>
                                    </tr>
                                    <tr>
                                        <th><strong>DESCRIPCIÓN DEL ANUNCIO:</strong></th>
                                        <td colspan="4">{{ $anun->descripcion }}</td>
                                    </tr>
                                    <tr>
                                        <th><strong>SITIO WEB DEL ANUNCIO:</strong></th>
                                        <td colspan="5"><span class="badge badge-primary" ><a style="color: white;" target="_blank" href="{{ $anun->sitioweb }}">{{ $anun->sitioweb }}</a></span></td>
                                    </tr>

                                    </tbody>
                                @endforeach
                            </table>

                            <div class="dt-responsive table-responsive">
                                <table id="simpletable" class="table table-striped table-bordered nowrap">
                                    <thead>
                                    <tr>
                                        <th style="text-align: center;">Nº</th>
                                        <th>IP Visitante</th>
                                        <th style="text-align: center;">Fecha y Hora</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($cliks as $key => $vis)
                                        <tr>
                                            <td style="text-align: center;">{{ $key+1 }}</td>
                                            <td>{{ $vis->ip }}</td>
                                            <td style="text-align: center;">{{ $vis->created_at }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>

                                {{ $cliks->links() }}
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




@include('layouts.admin.pie')
</body>
</html>
