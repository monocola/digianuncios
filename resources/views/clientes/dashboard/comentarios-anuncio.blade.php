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
        <div class="card card_main p-fixed users-main">
            <div class="user-box">
                <div class="card-block">
                    <div class="right-icon-control">
                        <input type="text" class="form-control  search-text" placeholder="Search Friend" id="search-friends">
                        <div class="form-icon">
                            <i class="icofont icofont-search"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Main-body start -->
<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="page-header-title">
                <h4>COMENTARIOS DEL ANUNCIO</h4>
                <span>Anuncios registrados</span>
            </div>

        </div>
        <!-- Page-header end -->
        <!-- Page-body start -->
        @if (session('success'))
            <div class="alert alert-primary background-primary">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="icofont icofont-close-line-circled text-white"></i>
                </button>
                <strong>Éxito!</strong> {{session('success') }}</code>
            </div>

        @endif

        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                        <div class="card">
                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
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

                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>




                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    @foreach ($comentario as $key => $comm)
                    <div class="card">
                        <div class="card-block">
                            <div class="dt-responsive table-responsive">
                                <table border="0">
                                    <tr>
                                        <td><img width="35" height="35" src="{{ asset('img/user-icon.jpg') }}" /></td>
                                        <td style="font-size: 12px;"><strong>&nbsp; {{ $comm->obtenerUsuario->name }} {{ $comm->obtenerUsuario->lastname }}</strong><br/>
                                            @if($comm->user_id == Auth::user()->id || Auth::user()->id == $comm->user_propietary )
                                                <span style="font-size: 10Px;"><a href="/admin/comentario/{{$comm->id}}/eliminar" style="text-decoration:none;color:#8b9ab0;" >&nbsp; <span class="badge badge-danger">Eliminar</span></a> </span>
                                            @endif
                                        </td>

                                    </tr>
                                </table>
                                <table style="font-size: 12px;">
                                    <br/>
                                    <tr>
                                        <td style="color: #5e696d;text-align: justify;">{{$comm->comentario}}<br/>
                                            <br/><strong><i class="fas fa-calendar-alt"></i> Publicado {{ $comm->created_at->diffForHumans() }}.</strong></td>
                                    </tr>
                                </table>


                            </div>
                        </div>
                    </div>
                    @endforeach



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