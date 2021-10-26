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
@if(Auth::user()->tipo == 0)
    @include('layouts.admin.menu-manager')
@elseif(Auth::user()->tipo == 2)
    @include('layouts.admin.menu')
@endif
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
            <!-- Page header start -->
            <div class="page-header">
                <div class="page-header-title">
                    <h4> MIS NOTIFICACIONES </h4>
                    <span>Administración de Anuncios</span>
                </div>


            </div>


            <!-- Page header end -->
            <!-- Page body start -->
            @if($notificationsAll->count() == 0)
                <div class="alert alert-warning icons-alert" style="text-align: center;">
                    <p><code>Usted no tiene Notificaciones.</code></p>
                </div>
            @endif

                    <!-- respuestas -->
            @foreach ($notificationsAll as  $not)
                        <div class="col-sm-12">
                            <!-- Basic Form Inputs card start -->
                            <div class="card">
                                <div class="card-header">
                                    <h5><a href="/admin/notifications/{{ $not->id }}/view"> {{ $not->subject }}</a> @if( $not->state == 0) <span style="color:white;" class="badge badge-warning">Nuevo</span> @endif </strong>
                                    </h5>
                                    <span>{{ str_limit($not->body ,20)}} </span>
                                    <span>{{ $not->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
            @endforeach
                </div>
            </div>
        </div>


        <!-- Page body end -->
    </div>


    </div>
@include('copyright.footer')

</body>
</html>
