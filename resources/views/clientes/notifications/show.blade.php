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
        <!-- Page header start -->
        <div class="page-header">
            <div class="page-header-title">
                <h4> MIS NOTIFICACIONES </h4>
                <span>Administración de Anuncios</span>
            </div>


        </div>


        <!-- Page header end -->
        <!-- Page body start -->


        <!-- respuestas -->
        @foreach($notificacion as $not)
            <div class="col-sm-12">
                <!-- Basic Form Inputs card start -->
                <div class="card">
                    <div class="card-header">
                        <h5><strong>{{ $not->subject }}</strong>
                        </h5>
                        <span>{{ $not->body }} </span>

                        <p></p>
                        <span>Atentamente, </span>
                        <span>El equipo de digianuncios</span>
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
