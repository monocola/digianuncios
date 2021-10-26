<!DOCTYPE html>
<html lang="en">
@include('layouts.admin.cabecera')
@if (session('textoAlerta'))
    <script>
        $( document ).ready(function() {
            $('#default-success').modal('toggle')
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
<!-- Sidebar inner chat start-->
<div class="showChat_inner">

</div>
<!-- Sidebar inner chat end-->
<!-- Main-body start -->
<div class="main-body">
    <div class="page-wrapper">
        <!-- Page-header start -->
        @foreach ($anuncio as $anu2)
            <div class="page-header">
                <div class="page-header-title">
                    <h4>DETALLE DEL ANUNCIO
                        @if($anu2->estado == 0)
                            <span style="color:white" class="badge badge-warning">{{$anu2->estado($anu2->estado)}}</span>
                        @elseif($anu2->estado == 1)
                            <span style="color:white" class="badge badge-success">{{$anu2->estado($anu2->estado)}}</span>
                        @elseif($anu2->estado == 2)
                            <span style="color:white" class="badge badge-danger">{{$anu2->estado($anu2->estado)}}</span>
                        @endif

                    </h4>
                    <span>Panel de Anuncios Clientes</span>
                </div>

            </div>
    @endforeach
    <!-- Page-header end -->
        <!-- Page-body start -->
        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Zero config.table start -->
                    <div class="card">

                        <div class="card-block">
                            <div class="dt-responsive table-responsive">
                                @foreach ($anuncio as $anu)
                                    <form>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Código</label>
                                            <div class="col-sm-10">
                                                <input type="text" disabled  class="form-control" style="width: 100%;" value="{{$anu->codigo}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Título</label>
                                            <div class="col-sm-10">
                                                <input type="text" disabled class="form-control" style="width: 100%;" value="{{$anu->titulo}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Categoría</label>
                                            <div class="col-sm-10">
                                                <input type="text" disabled class="form-control" style="width: 100%;" value="{{$anu->category_name}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Descripción </label>
                                            <div class="col-sm-10">
                                                <textarea rows="5" disabled cols="5" class="form-control" style="width: 100%;">{{$anu->descripcion}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Dirección</label>
                                            <div class="col-sm-10">
                                                <input type="text" disabled class="form-control" style="width: 100%;" value="{{$anu->direccion}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Distrito</label>
                                            <div class="col-sm-10">
                                                <input type="text" disabled class="form-control" style="width: 100%;" value="{{$anu->distrito}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Provincia</label>
                                            <div class="col-sm-10">
                                                <input type="text" disabled class="form-control" style="width: 100%;" value="{{$anu->provincia}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Pais</label>
                                            <div class="col-sm-10">
                                                <input type="text" disabled class="form-control" style="width: 100%;" value="{{$anu->pais}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Teléfono</label>
                                            <div class="col-sm-10">
                                                <input type="text" disabled class="form-control" style="width: 100%;" value="{{$anu->telefono}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Sitio Web</label>
                                            <div class="col-sm-10">
                                                <input type="text" disabled class="form-control" style="width: 100%;" value="{{$anu->sitioweb}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Url facebook</label>
                                            <div class="col-sm-10">
                                                <input type="text" disabled class="form-control" style="width: 100%;" value="{{$anu->facebook}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Url Twitter</label>
                                            <div class="col-sm-10">
                                                <input type="text" disabled class="form-control" style="width: 100%;" value="{{$anu->twitter}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Url Instagram</label>
                                            <div class="col-sm-10">
                                                <input type="text" disabled class="form-control" style="width: 100%;" value="{{$anu->instagram}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Url Pinterest</label>
                                            <div class="col-sm-10">
                                                <input type="text" disabled class="form-control" style="width: 100%;" value="{{$anu->pinterest}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Correo</label>
                                            <div class="col-sm-10">
                                                <input type="text" disabled class="form-control" style="width: 100%;" value="{{$anu->correo}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Estado</label>
                                            <div class="col-sm-10">
                                                <input type="text" disabled class="form-control" style="width: 100%;" value="{{$anu->estado($anu->estado)}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Dirección IP</label>
                                            <div class="col-sm-10">
                                                <input type="text" disabled class="form-control" style="width: 100%;" value="{{$anu->ip}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Fecha Creación</label>
                                            <div class="col-sm-10">
                                                <input type="text" disabled class="form-control" style="width: 100%;" value="{{$anu->created_at}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Fecha Actualización</label>
                                            <div class="col-sm-10">
                                                <input type="text" disabled class="form-control" style="width: 100%;" value="{{$anu->updated_at}}">
                                            </div>
                                        </div>


                                    </form>

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
                                                        <span class="center" style="width: 10px;">{{ session('textoAlerta') }}</span>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success" data-dismiss="modal">Aceptar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page body start -->
                                    <div class="page-body gallery-page">
                                        <div class="row">
                                            <!-- image grid -->
                                            <div class="col-sm-12">
                                                <!-- Image grid card start -->
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Banner del Anuncio</h5>

                                                    </div>
                                                    <div class="card-block">
                                                        <div class="row">
                                                            <div class="col-lg-4 col-sm-6">
                                                                <div class="thumbnail">
                                                                    <div class="thumb">
                                                                        <img src="/anuncios/{{$anu->banner}}" alt="" class="img-fluid img-thumbnail">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Image grid card end -->
                                            </div>
                                        </div>



                                        @endforeach
                                        <div class="row" style="text-align: right;" >
                                            <label class="col-sm-12"></label>
                                            <div class="col-sm-12">
                                                <a href="{{ url()->previous() }}" class="btn btn-outline-warning m-b-0">Volver</a>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page-body end -->
        </div>
    </div>
</div>
@include('copyright.footer')

</body>
</html>
