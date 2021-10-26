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
@foreach ($miTicket as $key => $tk)
<div class="main-body">
    <div class="page-wrapper">
        <!-- Page header start -->
        <div class="page-header">
            <div class="page-header-title">
                <h4> TICKET #{{ $tk->codigo }} </h4>
                <span></span>
            </div>


        </div>


        <!-- Page header end -->
        <!-- Page body start -->
        <div class="page-body">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Basic Form Inputs card start -->
                    <div class="card">
                        <div class="card-block">

                            <div class="card-block user-box">

                                <div class="media">
                                    <a class="media-left" href="#">
                                        <img class="media-object img-circle m-r-20" src="/avatars/{{ $tk->user->avatar }}" alt="Generic placeholder image">
                                    </a>
                                    <div class="media-body b-b-theme social-client-description">
                                        <div class="chat-header">{{ $tk->user->name }} {{ $tk->user->lastname }}<span class="text-muted">{{ $tk->created_at }}</span>
                                            <div class="chat-header">Dirección del Ticket: {{ $tk->tipoTicket($tk->tipo) }}</div>
                                            <div class="chat-header">Asunto: {{ $tk->asunto }}</div>
                                            <div class="chat-header">Relación: [{{ $tk->anuncio->codigo}}] - {{ $tk->anuncio->titulo }}</div>
                                        </div>
                                        <p class="text-muted">{{ $tk->mensaje }}</p>
                                    </div>
                                </div>
                                @foreach ($respuestas as $key => $rp)
                                    <div class="media">
                                        <a class="media-left" href="#">
                                            <img class="media-object img-circle m-r-20" src="/avatars/{{ $rp->user->avatar }}" alt="Generic placeholder image">
                                        </a>
                                        <div class="media-body b-b-theme social-client-description">
                                            <div class="chat-header">{{ $rp->user->name }} {{ $rp->user->lastname }}<span class="text-muted">{{ $rp->created_at }}</span>
                                                <div class="chat-header">Dirección del Ticket: {{ $tk->tipoTicket($tk->tipo) }}</div>
                                                <div class="chat-header">Asunto: {{ $tk->asunto }}</div>
                                                <div class="chat-header">Relación: [{{ $tk->anuncio->codigo}}] - {{ $tk->anuncio->titulo }}</div>
                                            </div>
                                            <p class="text-muted"> {{ $rp->mensaje }}</p>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="media">
                                    <a class="media-left" href="#">
                                        <img class="media-object img-circle m-r-20" src="/avatars/{{Auth::user()->avatar}}" alt="{{Auth::user()->name}}">
                                    </a>

                                    <div class="media-body">
                                        <form class="" action="/manager/miticket-respuesta"  method="post" onsubmit="return checkSubmit();">
                                            {{ csrf_field() }}
                                            <div class="">
                                                <textarea style="width: 100%;" name="mensaje" class="f-13 form-control msg-send" rows="3" cols="10" required="" placeholder="responda aquí..."></textarea>
                                                <input type="hidden" name="anuncio_relacionado" value="{{ $tk->anuncio_id }}">
                                                <input type="hidden" name="ticket_relacionado" value="{{ $tk->id}}">
                                                <input type="hidden" name="tipo" value="0">
                                                <div class="text-right m-t-20"><button type="submit"  class="btn btn-primary waves-effect waves-light">Responder</button></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>

                <!-- respuestas -->

            </div>
        </div>
    </div>


    <!-- Page body end -->
</div>


</div>
@endforeach




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
@include('copyright.footer')
@include('layouts.admin.piehome')
</body>
</html>
